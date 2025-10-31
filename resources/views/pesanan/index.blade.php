@extends('layout')

@section('content')
<h2>Daftar Pesanan</h2>
<table>
  <thead>
    <tr><th>ID</th><th>Tanggal</th><th>Pelanggan</th><th>Status</th><th>Total</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $ps)
    <tr>
      <td><a href="{{ route('pesanan.show',$ps) }}">{{ $ps->id }}</a></td>
      <td>{{ $ps->tanggal_pesanan->format('Y-m-d') }}</td>
      <td>{{ $ps->pelanggan->nama }}</td>
      <td>{{ $ps->status }}</td>
      <td>Rp{{ number_format($ps->total_harga ?? 0,0,',','.') }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
