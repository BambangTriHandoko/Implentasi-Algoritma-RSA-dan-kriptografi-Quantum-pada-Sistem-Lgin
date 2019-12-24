<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan PDF</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
                <th>Project</th>
                <th>No PO</th>
                <th>Nama</th>
                <th>Jumlah Tagihan</th>
                <th>Tanggal Invoice</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 1
            @endphp
			@foreach($laporan as $l)
			<tr>
				 <td>{{$i}}</td>
        <td>{{$l->nama_project}}</td>
        <td>{{$l->no_purchase_order}}</td>
       <td>{{ $l->Customer }}</td>
        <td>
          @php
              $terbayar = 0;
              $hasil = 0;
          @endphp
          @foreach($l->pembayaran as $p)
            @php
                $terbayar = $terbayar + $p->jumlah_pembayaran
            @endphp
          @endforeach
          @php
              $hasil = $l->nominal_purchase_order - $terbayar;
          @endphp
          {{$hasil}}
        </td>
        <td>{{$l->tgl_pembayaran}}</td>
        <td>
            @if ($l->status_delivery == 1)
              Belum Selesai
            @elseif ($l->status_delivery == 2)
              Selesai
            @endif
        </td>
            </tr>
            @php
                $i++;
            @endphp
			@endforeach
		</tbody>
	</table>
 
</body>
</html>