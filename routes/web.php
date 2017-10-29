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


//Shopping
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

//Chekcout
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

//Find Product By Category
Route::get('/category/{c_id}/{p_id}', [
    'uses' => 'FrontEndController@detail',
    'as' => 'front.detail'
]);
Route::post('/category/{c_id}/{p_id}', [
    'uses' => 'ShoppingController@addToCart'
]);
Route::get('/category/{id}', [//by category
    'uses' => 'FrontEndController@findByCategory',
    'as' => 'front.category'
]);

//User Account
Route::get('/account', [
    'uses' => 'UsersController@account',
    'as' => 'account'
]);

Route::post('/account/update', [
    'uses' => 'UsersController@update',
    'as' => 'account.update'
]);


//Front Pages
Route::get('/about', [
    'uses' => 'FrontEndController@about',
    'as' => 'about'
]);

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

//Admin
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
Route::resource('admin/orders', 'Admin\\OrdersController');


//Customer login dll
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

//API
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

//email
Route::get('/email', [
    'uses' => 'MailsController@sendInvoice',
    'as' => 'email.invoice'
]);