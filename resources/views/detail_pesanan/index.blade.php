@extends('layout')

@section('content')
<h2>Detail Pesanan</h2>
<table>
  <thead>
    <tr><th>ID</th><th>Pesanan</th><th>Pelanggan</th><th>Produk</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $d)
    <tr>
      <td><a href="{{ route('detail-pesanan.show',$d) }}">{{ $d->id }}</a></td>
      <td><a href="{{ route('pesanan.show',$d->pesanan) }}">#{{ $d->pesanan_id }}</a></td>
      <td>{{ $d->pesanan->pelanggan->nama }}</td>
      <td><a href="{{ route('produk.show',$d->produk) }}">{{ $d->produk->nama }}</a></td>
      <td>{{ $d->jumlah }}</td>
      <td>Rp{{ number_format($d->harga_satuan,0,',','.') }}</td>
      <td>Rp{{ number_format($d->subtotal ?? ($d->jumlah*$d->harga_satuan),0,',','.') }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
