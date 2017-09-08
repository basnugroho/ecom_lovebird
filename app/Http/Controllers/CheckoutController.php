<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Cart;
use App\Product;
use Session;
use Auth;
use App\User;

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
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutReview () {
        
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }
}
