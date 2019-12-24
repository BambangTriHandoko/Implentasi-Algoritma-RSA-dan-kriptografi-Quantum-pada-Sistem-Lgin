<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Laporan;
// call model Purchase Order
use App\PurchaseOrder;
 
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PDF;

class LaporanController extends Controller
{
    public function index()
	{
		if(Session::get('user_level') == 3 || Session::get('user_level') == 4  || Session::get('user_level') == 1){
			$laporan = PurchaseOrder::all();
			return view('laporan/index',['laporan'=>$laporan]);
		}else{
			return redirect('/dashboard');
		}
	}
 
	public function export()
	{
		if(Session::get('user_level') == 3 || Session::get('user_level') == 4  || Session::get('user_level') == 1){
			return Excel::download(new LaporanExport, 'laporan.xlsx');
		}else{
			return redirect('/dashboard');
		}
	}

	public function cetak_pdf()
    {
		if(Session::get('user_level') == 3 || Session::get('user_level') == 4  || Session::get('user_level') == 1){
			$laporan = PurchaseOrder::all();
 
			$pdf = PDF::loadview('laporan/laporan_pdf',['laporan'=>$laporan]);
			return $pdf->download('laporan-pdf');
		}else{
			return redirect('/dashboard');
		}
    }
}
