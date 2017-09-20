<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MailsController extends Controller
{
    public function sendInvoice () {
        //return "send email";
        $currentRoute = Route::currentRouteName();
        return view('emails.mail')->with('currentRoute', $currentRoute);
    }
}
