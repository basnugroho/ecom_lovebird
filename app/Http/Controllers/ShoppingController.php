<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Cart;
use App\Product;
use Session;

class ShoppingController extends Controller
{
    public function cart () {
        $currentRoute = Route::currentRouteName(); //lokasi halaman
        return view ('cart')->with('currentRoute', $currentRoute);
    }

    public function addToCart (Request $request) {
        $product = Product::find($request->product_id);//produk terpilih
        $productPrice= $product->price;//harga produk
        $cartItem = Cart::add([ //tambah produk ke troli
            'id' => $product->id,
            'name' => $product->name,
            'price' => $productPrice,
            'qty' => 1,
            'options' => ['weight'=>$product->weight]
        ]);
        $beratTotal = 0; //berat total
        foreach (Cart::content() as $product) {
            $beratTotal+=$product->options->weight * $product->qty;
        }
        $request->session()->put('berat_total', $beratTotal);
        Cart::associate($cartItem->rowId, 'App\Product'); //asosiasi produk
        Session::flash('success', 'produk telah ditambahkan dalam cart');
        return redirect()->back();
    }

    public function cartUpdate (Request $request) {
        $rowId = $request->row_id;
        $qty = $request->qty;
        for($i = 0; $i < count($rowId); $i++) {
            Cart::update($rowId[$i], $qty[$i]);
        }
        $beratTotal = 0;
        foreach (Cart::content() as $product) { //update total berat
            $beratTotal+= ($product->options->weight * $product->qty);
        }
        Session::put('berat_total', $beratTotal);
        Session::flash('success', 'Informasi dalam cart telah diperbarui');
        return redirect()->back();
    }

    public function cartDelete () { //hapus 
        $rowId = request()->row_id;
        Cart::remove($rowId);
        Session::flash('success', 'Produk dalam cart berhasil dihapus');
        return redirect()->back();
    }
}
