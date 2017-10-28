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

    public function checkoutDelivery (Request $request) {
        if(Cart::content()->count() <= 0) {
            Session::flash('info', 'Cart masih kosong!');
            return redirect()->back();
        }
        $currentRoute = Route::currentRouteName();
        Session::forget('ongkir');
        Session::forget('ongkir_total');
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
            ->with('user', $user)
            ->with('berat_total', Session::get('berat_total'));
        }
        $request->session()->put('delivery_method', $request->delivery_method);
        Session::flash('info', 'Anda memilih metode pengiriman '.$request->delivery_method);
        return view('checkouts.checkout_payment')->with('currentRoute', $currentRoute);
    }

    public function checkoutPayment (Request $request) {

        $currentRoute = Route::currentRouteName();
        $user = Auth::user();
        $address = $user->address;

        if(isset($request->ongkir)) {
            $address->street = $request->street;
            $address->city = $request->city;
            $address->zip = $request->zip;
            $address->province = $request->state;
            $address->country = $request->country;
            $address->phone = $request->phone;
            $request->session()->put('ongkir', $request->ongkir);
            $request->session()->put('service', $request->service);
            $request->session()->put('ongkir_total', $request->ongkir_total);
            $address->save();
            Session::flash('info', 'info alamat pengiriman telah disimpan!');
        }
        return view('checkouts.checkout_payment')->with('currentRoute', $currentRoute);
    }

    public function checkoutReview (Request $request) {
        $request->session()->put('payment_method', $request->payment);
        Session::flash('info', 'anda memilih pembayaran '.$request->payment);
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }

    public function checkoutPay (Request $request) {
        $product_id = $request->get('product_id');
        $selling_prices = $request->get('selling_price');
        $quantities = $request->get('qty');
        $service = Session::get('service');
        $delivery_cost = $request->ongkir;
        $weight_total = $request->berat_total;
        $delivery_cost_total = $request->ongkir_total;
        $subtotal = $request->subtotal;
        $total = $request->total;

        //dd($request->all());
        //catat pesanan
        $order = Order::create([
            'status' => 'not paid',
            'user_id' => $request->user_id,
            'delivery_method' => $request->delivery_method,
            'delivery_service' => $service,
            'delivery_cost' => $delivery_cost,
            'weight_total' => $weight_total,
            'delivery_cost_total' => $delivery_cost_total,
            'payment_method' => Session::get('payment_method'),
            'total' => $request->total
        ]);
        
        //catat detail pesanan
        for($i = 0; $i < sizeOf($product_id); $i++) {
            $order_product = Order_Product::create([
                'order_id' => $order->id,
                'product_id' => $product_id[$i],
                'selling_price' => $selling_prices[$i],
                'quantity' => $quantities[$i]
            ]);
        }

        //kirim email
        $user = User::find($request->user_id);
        
        if ($ongkir = Session::has('ongkir')) {
            $total = ($total) + strval(Session::get('ongkir_total')/1000);//
        }

        $data = [
            'order' => Order::find($order->id),
            'user' => $user,
            'total' => $total
        ];
        Mail::send('emails.invoice', $data, function ($m) use ($user){
            $m->from('s6134117@student.ubaya.ac.id', 'BMW Master Surabaya');

            $m->to($user->email, $user->name)->subject('Tagihan Pesanan');
        });

        //hapus session
        Cart::destroy();
        Session::forget('ongkir');
        Session::forget('ongkir_total');
        Session::forget('berat_total');
        Session::flash('info', 'Email telah terkirim, silahkan cek email untuk pembayaran');
        return redirect()->route('front');
    }
}
