@extends('layout')

@section('content')
<h2>Pesanan #{{ $pesanan->id }}</h2>
<p>Tanggal: {{ $pesanan->tanggal_pesanan->format('Y-m-d') }} |
Pelanggan: <a href="{{ route('pelanggan.show',$pesanan->pelanggan) }}">{{ $pesanan->pelanggan->nama }}</a> |
Status: {{ $pesanan->status }}</p>

<table>
  <thead>
    <tr><th>Produk</th><th>Qty</th><th>Harga Satuan</th><th>Subtotal</th></tr>
  </thead>
  <tbody>
  @php $total = 0; @endphp
  @foreach ($pesanan->detailPesanans as $d)
    @php $sub = $d->subtotal ?? ($d->jumlah * $d->harga_satuan); $total += $sub; @endphp
    <tr>
      <td><a href="{{ route('produk.show',$d->produk) }}">{{ $d->produk->nama }}</a></td>
      <td>{{ $d->jumlah }}</td>
      <td>Rp{{ number_format($d->harga_satuan,0,',','.') }}</td>
      <td>Rp{{ number_format($sub,0,',','.') }}</td>
    </tr>
  @endforeach
  </tbody>
  <tfoot>
    <tr><th colspan="3" style="text-align:right;">Total</th><th>Rp{{ number_format($total,0,',','.') }}</th></tr>
  </tfoot>
</table>
@endsection
