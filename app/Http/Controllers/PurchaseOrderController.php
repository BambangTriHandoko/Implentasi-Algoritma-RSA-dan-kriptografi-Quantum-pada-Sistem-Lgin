<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// call model Purchase Order
use App\PurchaseOrder;
//lib db
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PurchaseOrderController extends Controller
{
    public function index()
    {
		if(Session::get('user_level') == 1){
			$PurchaseOrder = PurchaseOrder::all();
    		return view('purchase_order/index', ['PurchaseOrder' => $PurchaseOrder]);
		}else{
			return redirect('/dashboard');
		}
    	
    }

    public function tambah()
    {
		if(Session::get('user_level') == 1){
			return view('purchase_order/tambah');
		}else{
			return redirect('/dashboard');
		}
    	
    }

    public function tambah_proses(Request $request)
    {
		$ts = DB::table('purchase_order')
		->where('no_purchase_order','=', $request->no_purchase_order)
		->get();
		
		foreach ($ts as $t) {
			$x = $t->no_purchase_order;
		}

		if(empty($x)){
			PurchaseOrder::create([
				'no_purchase_order' => $request->no_purchase_order,
				'nama_project' => $request->nama_project,
				'customer' => $request->customer,
				'nominal_purchase_order' => $request->nominal_purchase_order,
				'status_delivery' => $request->status_delivery
			]);
			return redirect('/purchase_order')->with('tambahberhasil','Data berhasil ditambahkan.');
		}else{
			return redirect('/purchase_order/tambah')->with('tambahgagal','Data sudah ada');
		}
    }

	public function hapus($id_purchase_order)
	{
		if(Session::get('user_level') == 1){
			$purchaseOrder = PurchaseOrder::find($id_purchase_order);
			$purchaseOrder->delete();
			return redirect('/purchase_order');
		}else{
			return redirect('/dashboard');
		}
	    
	}

	public function edit($id)
	{
		if(Session::get('user_level') == 1){
			$PurchaseOrder = PurchaseOrder::find($id);
	   		return view('/purchase_order/edit', ['PurchaseOrder' => $PurchaseOrder]);
		}else{
			return redirect('/dashboard');
		}
	   
	}

	public function edit_proses($id, Request $request)
	{
		$PurchaseOrder = PurchaseOrder::find($id);
		$PurchaseOrder->no_purchase_order = $request->no_purchase_order;
		$PurchaseOrder->no_invoice = $request->no_invoice;
		$PurchaseOrder->tgl_invoice = date('Y-m-d', strtotime($request->tgl_invoice));
		$PurchaseOrder->nama_project = $request->nama_project;
		$PurchaseOrder->customer = $request->customer;
		$PurchaseOrder->nominal_purchase_order = $request->nominal_purchase_order;
		$PurchaseOrder->status_delivery = $request->status_delivery;
		$PurchaseOrder->progress = $request->progress;
		
		$PurchaseOrder->save();
		return redirect('/purchase_order');
	}


}
