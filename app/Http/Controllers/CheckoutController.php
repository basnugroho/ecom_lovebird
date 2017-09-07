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
    public function checkoutDelivery () {
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_delivery')->with('currentRoute', $currentRoute);
    }

    public function checkoutAddress (Request $request) {
        $currentRoute = Route::currentRouteName();
        //dd($user = Auth::user());
        //dd($user->admin);
        if($request->delivery == "jne") {
            return view('checkouts.checkout_address')->with('currentRoute', $currentRoute)
            ->with('delivery', $request->delivery)
            ->with('user', $user);
        }
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutPayment () {
        $currentRoute = Route::currentRouteName();
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutReview () {
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }
}
