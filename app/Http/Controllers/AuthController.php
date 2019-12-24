<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

// call model Users
use App\Users;
use DB;

class AuthController extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function auth(Request $request){
        $this->validate($request,
            ['username'=>'required'],
            ['password'=>'required']
        );
 
        $user = $request->input('username');
        $pass = $request->input('password');        
        $users = array();
        $users = DB::table('users')->where(['username'=> $user])->where(['password'=> $pass])->first();
        if(count( (array) $users )==0){

            return redirect('/')->with('logingagal','Login gagal');
        } else {  
            Session::put('username',$users->username);
            Session::put('user_level',$users->user_level);
            Session::put('nik',$users->nik);
            Session::put('login',TRUE);
            return redirect('/dashboard')->with('loginsukses','Login berhasil');
        }
    }

    public function logout()
    {
    	Session::flush();
        return redirect('/')->with('logout','Logout berhasil');
    }
}
