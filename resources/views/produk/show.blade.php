@extends('layout')

@section('content')
<h2>Produk: {{ $produk->nama }}</h2>
<p>Harga: Rp{{ number_format($produk->harga,0,',','.') }} | Stok: {{ $produk->stok }}</p>
<p>{{ $produk->deskripsi }}</p>

<h3>Muncul di Detail Pesanan</h3>
<table>
  <thead>
    <tr><th>Pesanan</th><th>Pelanggan</th><th>Qty</th><th>Harga Satuan</th><th>Subtotal</th></tr>
  </thead>
  <tbody>
  @forelse($produk->detailPesanans as $d)
    <tr>
      <td><a href="{{ route('pesanan.show',$d->pesanan) }}">#{{ $d->pesanan_id }}</a></td>
      <td>{{ $d->pesanan->pelanggan->nama }}</td>
      <td>{{ $d->jumlah }}</td>
      <td>Rp{{ number_format($d->harga_satuan,0,',','.') }}</td>
      <td>Rp{{ number_format($d->subtotal ?? ($d->jumlah*$d->harga_satuan),0,',','.') }}</td>
    </tr>
  @empty
    <tr><td colspan="5">Belum pernah dipesan.</td></tr>
  @endforelse
  </tbody>
</table>
@endsection
