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

Route::get('/customer/order/details', [
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


