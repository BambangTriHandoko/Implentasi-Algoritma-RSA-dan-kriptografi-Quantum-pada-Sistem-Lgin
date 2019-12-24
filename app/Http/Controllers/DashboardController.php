<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if(Session::get('login')){
            return view('dashboard');
        }else{
            return redirect('/authi/login')->with('alert','login dulu Gan!!!');
        }
        
    }
    
    
}
