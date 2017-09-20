<?php

//use Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function () {
    $curl = curl_init();
    //$id = $_GET['query'];
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
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
        return $response;
    }
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'front'
]);
Route::get('/contact', [
    'uses' => 'FrontEndController@contact',
    'as' => 'contact'
]);
Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);
Route::post('/cart', [
    'uses' => 'ShoppingController@addToCart',
    'as' => 'cart.add'
]);
Route::get('/cart/update', [
    'uses' => 'ShoppingController@cartUpdate',
    'as' => 'cart.update'
]);
Route::get('/cart/delete', [
    'uses' => 'ShoppingController@cartDelete',
    'as' => 'cart.delete'
]);


Route::get('/checkout/delivery', [
    'uses' => 'CheckoutController@checkoutDelivery',
    'as' => 'checkout.delivery'
]);
Route::post('/checkout/address', [
    'uses' => 'CheckoutController@checkoutAddress',
    'as' => 'checkout.address'
]);
Route::post('/checkout/payment', [
    'uses' => 'CheckoutController@checkoutPayment',
    'as' => 'checkout.payment'
]);
Route::post('/checkout/review', [
    'uses' => 'CheckoutController@checkoutReview',
    'as' => 'checkout.review'
]);
Route::post('/checkout/pay', [
    'uses' => 'CheckoutController@checkoutPay',
    'as' => 'checkout.pay'
]);


Route::get('/category/{c_id}/product/{p_id}', [
    'uses' => 'FrontEndController@detail',
    'as' => 'front.detail'
]);
Route::get('/category/{id}', [//by category
    'uses' => 'FrontEndController@findByCategory',
    'as' => 'front.category'
]);

Route::get('/account', [
    'uses' => 'UsersController@account',
    'as' => 'account'
]);

Route::get('/about', [
    'uses' => 'FrontEndController@about',
    'as' => 'about'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/admin/profile', [
    'uses' => 'Admin\\AdminController@profile',
    'as' => 'admin.profile'
]);

Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/products', 'Admin\\ProductsController');
Route::resource('admin/customers', 'Admin\\CustomersController');

Route::get('/customer/login', [
    'uses' => 'UsersController@login',
    'as' => 'customer.login'
]);
Route::get('/customer/register', [
    'uses' => 'UsersController@register',
    'as' => 'customer.register'
]);
Route::get('/customer/reset', [
    'uses' => 'UsersController@reset',
    'as' => 'customer.password.request'
]);
Route::get('/customer/orders', [
    'uses' => 'UsersController@orders',
    'as' => 'customer.orders'
]);

Route::get('/customer/order/{id}/details/', [
    'uses' => 'UsersController@order_details',
    'as' => 'order.details'
]);


Route::get('/provinces', [
    'uses' => 'OngkirsController@get_provinces',
    'as' => 'ongkir.provinces'
]);

Route::get('/cities', [
    'uses' => 'OngkirsController@get_cities',
    'as' => 'ongkir.cities'
]);
Route::get('/services', [
    'uses' => 'OngkirsController@get_services',
    'as' => 'ongkir.services'
]);

use Illuminate\Support\Facades\Route;

Route::get('/email', [
    'uses' => 'MailsController@sendInvoice',
    'as' => 'email.invoice'
]);