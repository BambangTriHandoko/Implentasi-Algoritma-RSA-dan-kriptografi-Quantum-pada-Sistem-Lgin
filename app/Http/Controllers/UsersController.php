<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//lib db
use Illuminate\Support\Facades\DB;
// call model users
use App\Users;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index()
    {
    	if(Session::get('user_level') == 1){
			$users = Users::all();
    		return view('users/index', ['users' => $users]);
		}else{
			return redirect('/dashboard');
		}
    }

    public function tambah()
    {
		if(Session::get('user_level') == 1){
			return view('users/tambah');
		}else{
			return redirect('/dashboard');
		}
    }

    public function tambah_proses(Request $request)
    { $M= $request->key;
     function encRSA($M){
	$data[0]=1;
	for($i=0;$i<=35;$i++){
		$rest[$i]=pow($M,1)%119;
		if($data[$i]<=119){
		$data[$i+1]=$data[$i]*$rest[$i]%119;
		}
	else{
		$data[$i+1]=$data[$i]*$rest[$i];
	}
	}
	$get=$data[35]%119;
	return$get;
}
function decRSA($E){
$data[0]=1;
	for($i=0;$i<=11;$i++){
		$rest[$i]=pow($E,1)%119;
		if($data[$i]<=119){
		$data[$i+1]=$data[$i]*$rest[$i]%119;
		}
	else{
		$data[$i+1]=$data[$i]*$rest[$i];
	}
}
	$get=$data[11]%119;
	return$get;}
	$enc='';
	$dec=''; 
	$kalimat=$request->password;
//encrypt
for($i=0;$i<strlen($kalimat);$i++)
{
 $m=ord($kalimat[$i]);
 	if($m<=119){
 		$enc=$enc.chr(encRSA($m));
 	}
 	else{$enc=$enc.$kalimat[$i];}

}
//decrypt
for($i=0;$i<strlen($kalimat);$i++)
{
 $m=ord($enc[$i]);
 	if($m<=119){
 		$dec=$dec.chr(decRSA($m));
 	}
 	else{$dec=$dec.$enc[$i];}

}
		DB::table('users')->insert([
			'nik' => $request->nik,
			'username' => $request->username,
			'password' => $enc,
			'user_level' => $request->userlevel,
			'email' => $request->email
		]);
		return redirect('/users');
    }
    
    public function hapus($id)
    { 
		if(Session::get('user_level') == 1){
			DB::table('users')->where('nik',$id)->delete();
			return redirect('/users');
		}else{
			return redirect('/dashboard');
		}
    }
    
	public function edit($id)
	{
		if(Session::get('user_level') == 1){
			$users = DB::table('users')->where('nik',$id)->get();
			return view('users/edit',['users' => $users]);
		}else{
			return redirect('/dashboard');
		}
	}

	public function edit_proses(Request $request)
	{ 	$M= $request->key;
		function encRSA($M){
	$data[0]=1;
	for($i=0;$i<=35;$i++){
		$rest[$i]=pow($M,1)%119;
		if($data[$i]<=119){
		$data[$i+1]=$data[$i]*$rest[$i]%119;
		}
	else{
		$data[$i+1]=$data[$i]*$rest[$i];
	}
	}
	$get=$data[35]%119;
	return$get;
}
function decRSA($E){
$data[0]=1;
	for($i=0;$i<=11;$i++){
		$rest[$i]=pow($E,1)%119;
		if($data[$i]<=119){
		$data[$i+1]=$data[$i]*$rest[$i]%119;
		}
	else{
		$data[$i+1]=$data[$i]*$rest[$i];
	}
}
	$get=$data[11]%119;
	return$get;}
	$enc='';
	$dec=''; 
	$kalimat=$request->password;
//encrypt
for($i=0;$i<strlen($kalimat);$i++)
{
 $m=ord($kalimat[$i]);
 	if($m<=119){
 		$enc=$enc.chr(encRSA($m));
 	}
 	else{$enc=$enc.$kalimat[$i];}

}
//decrypt
for($i=0;$i<strlen($kalimat);$i++)
{
 $m=ord($enc[$i]);
 	if($m<=119){
 		$dec=$dec.chr(decRSA($m));
 	}
 	else{$dec=$dec.$enc[$i];}

}
		DB::table('users')->where('nik',$request->nik)->update([
			'nik' => $request->nik,
			'username' => $request->username,
			'password' => $enc,
			'user_level' => $request->userlevel,
			'email' => $request->email
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/users');
	}
}