@extends('layouts/master')

@section('content')
<div class="box">
  @if(\Session::has('tambahberhasil'))
  <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p><i class="icon fa fa-ok"></i> Data berhasil ditambahkan!</p>
  </div>
  @endif
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No Purchase Order</th>
        <th>No Invoice</th>
        <th>Tgl Invoice</th>
        <th>Nama Project</th>
        <th>Customer</th>
        <th>Nominal Purchase Order</th>
        <th>Status Order</th>
        <th>Progress</th>
        <th>Opsi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($PurchaseOrder as $po)
      <tr>
        <td>{{ $po->no_purchase_order }}</td>
        <td>{{ $po->no_invoice }}</td>
        <td>{{ $po->tgl_invoice }}</td>
        <td>{{ $po->nama_project }}</td>
        <td>{{ $po->customer }}</td>
        <td>{{ $po->nominal_purchase_order }}</td>
        <td>
            @if ($po->status_delivery == 1)
              Belum Selesai
            @elseif ($po->status_delivery == 2)
              Selesai
            @endif
        </td>
        <td>{{ $po->progress }}</td>
        <td>
          <a href="/purchase_order/edit/{{ $po->id_purchase_order }}">Edit</a>
          - 
          <a href="/purchase_order/hapus/{{ $po->id_purchase_order }}">Hapus</a>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>No Purchase Order</th>
        <th>No Invoice</th>
        <th>Tgl Invoice</th>
        <th>Nama Project</th>
        <th>Customer</th>
        <th>Nominal Purchase Order</th>
        <th>Status Order</th>
        <th>Progress</th>
        <th>Opsi</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection