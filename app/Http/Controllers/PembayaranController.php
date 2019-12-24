<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// call model Pembayaran
use App\Pembayaran;
// call model Purchase Order
use App\PurchaseOrder;

use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    public function index()
    {
		if(Session::get('user_level') == 2  || Session::get('user_level') == 1){
			$Pembayaran = Pembayaran::all();
    		return view('pembayaran/index', ['pembayaran' => $Pembayaran]);
		}else{
			return redirect('/dashboard');
		}
        
    }

    public function hapus($pembayaran_id)
	{
		if(Session::get('user_level') == 2){
			$pembayaran = Pembayaran::find($pembayaran_id);
			$pembayaran->delete();
			return redirect('/pembayaran');
		}else{
			return redirect('/dashboard');
		}

	    
    }
    
    public function tambah()
    {
		if(Session::get('user_level') == 2){
			$PurchaseOrder = PurchaseOrder::all();
    		return view('pembayaran/tambah', ['PurchaseOrder' => $PurchaseOrder]);
		}else{
			return redirect('/dashboard');
		}
		
    }

    public function tambah_proses(Request $request)
    {
        $tanggal = $request->tgl_pembayaran;
        $tanggal = date("Y-m-d", strtotime($tanggal));
        Pembayaran::create([
    		'id_purchase_order' => $request->id_purchase_order,
			'jumlah_pembayaran' => $request->jumlah_pembayaran,
			'tgl_pembayaran' => $tanggal
    	]);
 
    	return redirect('/pembayaran');
    }

    public function edit($id)
	{
		if(Session::get('user_level') == 2){
			$pembayaran 		= Pembayaran::find($id);
			$PurchaseOrder 	= PurchaseOrder::all();
			return view('/pembayaran/edit', ['pembayaran' => $pembayaran, 'PurchaseOrder' => $PurchaseOrder]);
		}else{
			return redirect('/dashboard');
		}
	   
	}

	public function edit_proses($id, Request $request)
	{
		$tanggal = $request->tgl_pembayaran;
        $tanggal = date("Y-m-d", strtotime($tanggal));
		$pembayaran = Pembayaran::find($id);
		$pembayaran->id_purchase_order = $request->id_purchase_order;
		$pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
		$pembayaran->tgl_pembayaran = $tanggal;
		$pembayaran->save();
		return redirect('/pembayaran');
	}
}