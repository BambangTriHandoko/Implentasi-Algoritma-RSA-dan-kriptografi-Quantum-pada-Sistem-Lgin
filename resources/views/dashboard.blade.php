@extends('layouts/master')

@section('content')
  @if(\Session::has('loginsukses'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fa fa-check"></i> Login Berhasil!</p>
  </div>
  @endif
  <h1>SELAMAT DATANG DI SIPII</h1><br>
  <h1>SISTEM INFORMASI PENCATATAN INVOICE</h1>
  ANDA TELAH MASUK SEBAGAI SUPER AKUN<br>
  SEMUA HALAMAN DAPAT DIAKSES SECARA PENUH<br>
  SILAHKAN MASTER......<br>
@endsection