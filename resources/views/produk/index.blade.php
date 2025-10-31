@extends('layout')

@section('content')
<h2>Daftar Produk</h2>
<table>
  <thead>
    <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Dipakai di Detail</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="{{ route('produk.show',$p) }}">{{ $p->nama }}</a></td>
      <td>Rp{{ number_format($p->harga,0,',','.') }}</td>
      <td>{{ $p->stok }}</td>
      <td>{{ $p->detail_pesanans_count ?? $p->detailPesanans()->count() }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
