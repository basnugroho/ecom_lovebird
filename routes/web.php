<?php

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

Route::get('/admin/profile', [
    'uses' => 'Admin\\AdminController@profile',
    'as' => 'admin.profile'
]);
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/products', 'Admin\\ProductsController');