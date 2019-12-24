<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = ['pembayaran_id','id_purchase_order','jumlah_pembayaran','tgl_pembayaran'];
    protected $primaryKey = 'pembayaran_id';
    public $timestamps = false;

    public function purchaseOrder(){
    	return $this->belongsTo('App\PurchaseOrder', 'id_purchase_order');
    }

    public function purchaseOrder2(){
    	return $this->hasOne('App\PurchaseOrder', 'id_purchase_order');
    }
}
