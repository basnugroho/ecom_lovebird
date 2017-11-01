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
    public function index()
    {
        $currentRoute = Route::currentRouteName(); //lokasi halaman
        $categories = Category::all(); //semua kategori
        $products = Product::all(); //semua produk
        return view('products')->with('categories', $categories) //passing kategori
                               ->with('products', $products) //passing produk
                               ->with('currentRoute', $currentRoute); //passing lokasi
    }

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

    public function findByCategory($id)
    {
        $currentRoute = Route::currentRouteName();
        $categories = Category::all();
        $category_find = Category::find($id);
        $products = $category_find->products;
        return view('products_category')->with('categories', $categories)
                               ->with('products', $products)
                               ->with('category_find', $category_find)
                               ->with('currentRoute', $currentRoute);
    }

    public function contact()
    {
        $currentRoute = Route::currentRouteName();
        return view ('contact')->with('currentRoute', $currentRoute);;
    }

    public function about() {
        $currentRoute = Route::currentRouteName();
        return view ('about')->with('currentRoute', $currentRoute);;
    }
}