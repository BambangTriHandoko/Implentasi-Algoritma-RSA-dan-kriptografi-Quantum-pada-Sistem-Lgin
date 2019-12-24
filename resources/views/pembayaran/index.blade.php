@extends('layouts/master')

@section('content')
<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nama</th>
        <th>Jumlah Pembayaran</th>
        <th>Tanggal Pembayaran</th>
        @if (Session::get('user_level') == 2 || Session::get('user_level') == 1)
        <th>Opsi</th>
        @endif
      </tr>
      </thead>
      <tbody>
      @foreach($pembayaran as $p)
      <tr>
        <td>
          {{ $p->purchaseOrder['Customer'] }}
        </td>
        <td>{{ $p->jumlah_pembayaran }}</td>
        <td>{{ $p->tgl_pembayaran }}</td>
        @if (Session::get('user_level') == 2)
        <td>
          <a href="/pembayaran/edit/{{ $p->pembayaran_id }}">Edit</a>
          - 
          <a href="/pembayaran/hapus/{{ $p->pembayaran_id }}">Hapus</a>
        </td>
        @endif
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Nama</th>
        <th>Jumlah Pembayaran</th>
        <th>Tanggal Pembayaran</th>
        @if (Session::get('user_level') == 2 ||Session::get('user_level') == 1)
        <th>Opsi</th>
        @endif
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection