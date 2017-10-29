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
        $province = $this->getCity($request->state, $request->city)['rajaongkir']['results']['province'];
        $city_type = $this->getCity($request->state, $request->city)['rajaongkir']['results']['type'];
        $city = $this->getCity($request->state, $request->city)['rajaongkir']['results']['city_name'];
        $service = $this->getService($request->city)['rajaongkir']['results'][0]['costs'][$request->service]['service'];
        //dd($service);
        if(isset($request->ongkir)) {
            $address->street = $request->street;
            $address->city_type = $city_type;
            $address->city = $city;
            $address->zip = $request->zip;
            $address->province = $province;
            $address->country = 'Indonesia';
            $address->phone = $request->phone;
            $request->session()->put('ongkir', $request->ongkir);
            $request->session()->put('service', $service);
            $request->session()->put('ongkir_total', $request->ongkir_total);
            $address->save(); //update alamat
        }
        if(isset($request->name)) {
            $user->name = $request->name;
            $user->save();
        }
        Session::flash('info', 'info alamat pengiriman telah disimpan!');
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
        $berat_total = $request->berat_total;
        $total = $request->total;

        //dd($request->all());
        //catat pesanan;
        if(Session::has('ongkir')) {
            $order = Order::create([
                'status' => 'not paid',
                'user_id' => $request->user_id,
                'delivery_method' => $request->delivery_method,
                'delivery_service' => Session::get('service'),
                'delivery_cost' => $request->ongkir,
                'weight_total' => $berat_total,
                'delivery_cost_total' => Session::get('ongkir_total'),
                'sub_total' => Cart::total()*1000,
                'payment_method' => Session::get('payment_method'),
                'total' => $request->total
            ]);
        } else {
            $order = Order::create([
                'status' => 'not paid',
                'user_id' => $request->user_id,
                'delivery_method' => $request->delivery_method,
                'delivery_cost' => 0,
                'weight_total' => strval(Session::get('berat_total'))/1000,
                'delivery_cost_total' => 0,
                'sub_total' => Cart::total()*1000,
                'payment_method' => Session::get('payment_method'),
                'total' => $request->total
            ]);
        }

        
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

    public function getCity($prov_id, $city_id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$city_id."&province=".$prov_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "key: a3b15c671a13e8bd8a1d98a3067c9419"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response,true);
        }
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=".$prov_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "key: a3b15c671a13e8bd8a1d98a3067c9419"
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response,true);
        }
    }

    public function getService($dest_id) {
        $origin = 444;
        $destination = $dest_id;
        $weight = 1000;
        $courier = "jne";

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
            return json_decode($response,true);
        }
    }
}
