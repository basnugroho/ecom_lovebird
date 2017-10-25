<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Cart;
use App\Product;
use Session;
use Auth;
use App\User;
use App\Address;
use App\Order;
use App\Order_Product;
use Mail;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutDelivery () {
        if(Cart::content()->count() <= 0) {
            Session::flash('info', 'Cart masih kosong!');
            return redirect()->back();
        }

        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_delivery')->with('currentRoute', $currentRoute);
    }

    public function checkoutAddress (Request $request) {

        $currentRoute = Route::currentRouteName();
        $user = Auth::user();
        if($request->delivery_method == "jne") {
            $request->session()->put('delivery_method', $request->delivery_method);
            Session::flash('info', 'Anda memilih metode pengiriman '.$request->delivery_method);
            return view('checkouts.checkout_address')->with('currentRoute', $currentRoute)
            ->with('delivery_method', $request->delivery_method)
            ->with('user', $user);
        }
        $request->session()->put('delivery_method', $request->delivery_method);
        Session::flash('info', 'Anda memilih metode pengiriman '.$request->delivery_method);
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }

    public function checkoutPayment (Request $request) {

        $currentRoute = Route::currentRouteName();
        $user = Auth::user();
        $address = $user->address;
        if(isset($request->ongkir)) {
            //dd($request->all());
            $address->street = $request->street;
            $address->city = $request->city;
            $address->zip = $request->zip;
            $address->province = $request->state;
            $address->country = $request->country;
            $address->phone = $request->phone;
            $request->session()->put('ongkir', $request->ongkir);
            $request->session()->put('service', $request->service);
            $address->save();
            Session::flash('info', 'info alamat telah disimpan!');
        }

        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutReview (Request $request) {
        $request->session()->put('payment', $request->payment);
        Session::flash('info', 'anda memilih pembayaran '.$request->payment);
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }

    public function checkoutPay (Request $request) {
        $quantities = $request->get('qty');
        $selling_prices = $request->get('selling_price');
        $product_id = $request->get('product_id');

        $service = Session::get('service');
        $delivery_cost = Session::get('ongkir');

        $order = Order::create([
            'status' => 'not paid',
            'user_id' => $request->user_id,
            'delivery_method' => $request->delivery_method,
            'delivery_service' => $service,
            'delivery_cost' => $delivery_cost,
            // 'payment_method' => $request->payment,
            'total' => $request->total
        ]);

        for($i = 0; $i < sizeOf($product_id); $i++) {
            $order_product = Order_Product::create([
                'order_id' => $order->id,
                'product_id' => $product_id[$i],
                'selling_price' => $selling_prices[$i],
                'quantity' => $quantities[$i]
            ]);
        }

        $user = User::find($request->user_id);
        $total = $request->total;
        if ($ongkir = Session::has('ongkir')) {
            $total = ($total) + strval(Session::get('ongkir')/1000);
        } 

        $data = [
            'order' => Order::find($order->id),
            'user' => $user,
            'total' => $total
        ];
    
        //send invoice
        Mail::send('emails.invoice', $data, function ($m) use ($user){
            $m->from('s6134117@student.ubaya.ac.id', 'BMW Master Surabaya');

            $m->to($user->email, $user->name)->subject('Tagihan Pesanan');
        });
        Cart::destroy();
        Session::flash('info', 'silahkan cek email untuk petunjuk pembayaran');
        return redirect()->route('front');
    }
}
