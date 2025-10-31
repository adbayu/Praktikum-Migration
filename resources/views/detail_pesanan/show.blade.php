@extends('layout')

@section('content')
<h2>Detail Pesanan #{{ $d->id }}</h2>
<p>Pesanan: <a href="{{ route('pesanan.show',$d->pesanan) }}">#{{ $d->pesanan_id }}</a> |
Produk: <a href="{{ route('produk.show',$d->produk) }}">{{ $d->produk->nama }}</a></p>
<p>Qty: {{ $d->jumlah }} | Harga: Rp{{ number_format($d->harga_satuan,0,',','.') }} |
Subtotal: Rp{{ number_format($d->subtotal ?? ($d->jumlah*$d->harga_satuan),0,',','.') }}</p>
@endsection
