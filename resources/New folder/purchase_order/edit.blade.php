@extends('layouts/master')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Update Data</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="/purchase_order/edit_proses/{{ $PurchaseOrder->id_purchase_order }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="NoPurchaseOrder">No Purchase Order</label>
            <input value=" {{ $PurchaseOrder->no_purchase_order }}" name="no_purchase_order" type="text" class="form-control" id="NoPurchaseOrder" placeholder="No Purchase Order" required>
          </div>

          <div class="form-group">
            <label for="NoInvoice">No Invoice</label>
            <input value=" {{ $PurchaseOrder->no_invoice }}" name="no_invoice" type="text" class="form-control" id="NoInvoice" placeholder="No Invoice" required>
          </div>

          <div class="form-group">
            <label>Tanggal Invoice:</label>
            <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                @php
                    if(!empty($PurchaseOrder->tgl_invoice)){
                      $myDateTime = DateTime::createFromFormat('Y-m-d', $PurchaseOrder->tgl_invoice);
                      $newDate = $myDateTime->format('d-m-Y');
                    }else{
                      $newDate = NULL;
                    }
                    
                @endphp
                <input name="tgl_invoice" value="{{ $newDate }}" type="text" class="form-control pull-right" id="datepicker">
            </div>
            <!-- /.input group -->
        </div>

          

          <div class="form-group">
            <label for="nama_project">Nama Project</label>
            <input value=" {{ $PurchaseOrder->nama_project }}" name="nama_project" type="text" class="form-control" id="nama_project" placeholder="Nama Project" required>
          </div>

          <div class="form-group">
            <label for="customer">Customer</label>
            <input value=" {{ $PurchaseOrder->customer }}" name="customer" type="text" class="form-control" id="customer" placeholder="Customer" required>
          </div>

          <div class="form-group">
            <label for="nominal_purchase_order">Nominal Purchase Order</label>
            <input value=" {{ $PurchaseOrder->nominal_purchase_order }}" name="nominal_purchase_order" type="text" class="form-control" id="nominal_purchase_order" placeholder="Nominal Purchase Order" required>
          </div>

          <label for="status_delivery">Status Delivery</label>
          <select name="status_delivery" class="form-control">
            <option value="1" selected>Belum Selesai</option>
            <option value="2">Selesai</option>
          </select>

          <div class="form-group">
            <label for="progress">Progress</label>
            <input value=" {{ $PurchaseOrder->progress }}" name="progress" type="text" class="form-control" id="progress" placeholder="Progress" required>
          </div>

          <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Update">
          </div>
        </form>
    </div>
</div>
@endsection
