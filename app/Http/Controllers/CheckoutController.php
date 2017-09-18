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
        if($request->delivery == "jne") {
            return view('checkouts.checkout_address')->with('currentRoute', $currentRoute)
            ->with('delivery', $request->delivery)
            ->with('user', $user);
        }
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
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
            $request->session()->put('delivery_id', $request->delivery_id);
            $request->session()->put('service', $request->service);
            $address->save();
            Session::flash('info', 'info alamat telah disimpan!');
        }

        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutReview () {
        
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }

    public function checkoutPay (Request $request) {
        //dd($request->all());
        $order = Order::create([
            'status' => 'not paid',
            'user_id' => $request->user_id,
            'delivery_method' => $request->delivery_method,
            'total' => $request->total
        ]);
        
        $selling_prices = json_encode($request->selling_price);
        $quantities = json_encode($request->qty);

        $order->products()->attach(
            $request->product_id,
            [
            'selling_price' => $selling_prices,
            'quantity' => $quantities
            ]
        );

        return redirect()->route('front');
    }
}
