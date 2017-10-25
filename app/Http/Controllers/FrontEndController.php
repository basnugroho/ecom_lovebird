<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Route;
use Cart;
use Session;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cart = Cart::all();
        $currentRoute = Route::currentRouteName();
        $categories = Category::all();
        $products = Product::all();
        return view('products')->with('categories', $categories)
                               ->with('products', $products)
                               ->with('currentRoute', $currentRoute);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($c_id, $p_id)
    {
        $currentRoute = Route::currentRouteName();
        $categories = Category::all();
        $category = Category::find($c_id);
        $product = Product::find($p_id);

        return view('product_details')->with('product', $product)
                                      ->with('category', $category)
                                      ->with('categories', $categories)
                                      ->with('currentRoute', $currentRoute);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findByCategory($id)
    {
        //echo $id;exit();
        $currentRoute = Route::currentRouteName();
        $categories = Category::all();
        $category_find = Category::find($id);
        $products = $category_find->products;
        return view('products_category')->with('categories', $categories)
                               ->with('products', $products)
                               ->with('category_find', $category_find)
                               ->with('currentRoute', $currentRoute);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $currentRoute = Route::currentRouteName();
        return view ('contact')->with('currentRoute', $currentRoute);;
    }

    public function about() {
        $currentRoute = Route::currentRouteName();
        return view ('about')->with('currentRoute', $currentRoute);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
