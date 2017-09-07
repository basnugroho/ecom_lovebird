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
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_delivery')->with('currentRoute', $currentRoute);
    }

    public function checkoutAddress (Request $request) {
        //dd($request->all());
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
        $weight = 1000;
        $origin = 444;
        $destination = $request->city;
        $courier = $request->courier;
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a3b15c671a13e8bd8a1d98a3067c9419"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $data = json_decode($response, true);
          return $data['rajaongkir']['results']['costs'][1];
        }

        $currentRoute = Route::currentRouteName();
        return view('checkouts.chekcout_payment')->with('currentRoute', $currentRoute);
    }
    public function checkoutReview () {
        $currentRoute = Route::currentRouteName();
        return view('checkouts.checkout_review')->with('currentRoute', $currentRoute);
    }
}
