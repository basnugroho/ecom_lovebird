<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Order;
use Auth;


class UsersController extends Controller
{
    public function account () {
        $user = Auth::user();
        $address = $user->address;
        //dd($user->admin);
        $currentRoute = Route::currentRouteName();
        if($user->admin != 1) {
            return view('customers.account')->with('currentRoute', $currentRoute)
            ->with('user', $user)
            ->with('address', $address);
        }
        return view('admin.dashboard');
    }

    public function login() {
        $currentRoute = Route::currentRouteName();
        return view('logins.login')->with('currentRoute', $currentRoute);
    }
    public function register() {
        $currentRoute = Route::currentRouteName();
        return view('logins.register')->with('currentRoute', $currentRoute);
    }
    public function reset () {
        $currentRoute = Route::currentRouteName();
        return view('logins.email')->with('currentRoute', $currentRoute);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $user = Auth::user();
        $orders = $user->orders;
        $currentRoute = Route::currentRouteName();
        return view('customers.orders')->with('currentRoute', $currentRoute)
        ->with('orders', $orders);
    }

    public function order_details($id)
    {
        $orders = Order::find($id);
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        return view('customers.order_details')->with('currentRoute', $currentRoute)
        ->with('orders', $orders)
        ->With('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
