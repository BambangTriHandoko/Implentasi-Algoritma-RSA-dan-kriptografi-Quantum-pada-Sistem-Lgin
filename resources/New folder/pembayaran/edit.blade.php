@extends('layouts/master')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Pembayaran</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @php
            $po = []
        @endphp
        @foreach ($PurchaseOrder as $item)
            @php
                $po[$item->id_purchase_order] = $item->no_purchase_order;
            @endphp
        @endforeach
        <form action="/pembayaran/edit_proses/{{ $pembayaran->pembayaran_id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label>No Invoice</label>
                {{ 
                    Form::select(
                        'id_purchase_order', 
                        $po, 
                        $pembayaran->id_purchase_order, 
                        array(
                            'class' => 'form-control select2'
                        )) 
                }}
            </div>

            <div class="form-group">
                <label for="jumlah_pembayaran">Jumlah Bayar</label>
                <input value=" {{ $pembayaran->jumlah_pembayaran }}" name="jumlah_pembayaran" type="text" class="form-control" id="jumlah_pembayaran" placeholder="Jumlah Pembayaran" required>
            </div>

            <div class="form-group">
                <label>Tanggal Pembayaran:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input value=" {{ $pembayaran->tgl_pembayaran }}" name="tgl_pembayaran" type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>

            <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
@endsection