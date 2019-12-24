<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = "purchase_order";
    protected $fillable = ['id_purchase_order','no_purchase_order','no_invoice','tgl_invoice','nama_project','customer', 'nominal_purchase_order', 'status_delivery','progress'];
    protected $primaryKey = 'id_purchase_order';
    public $timestamps = false;

    public function pembayaran(){
    	return $this->hasMany('App\Pembayaran','id_purchase_order');
    }
    public function pembayaran2(){
        return $this->belongsTo('App\Pembayaran', 'id_purchase_order');
    }
    
    
}
