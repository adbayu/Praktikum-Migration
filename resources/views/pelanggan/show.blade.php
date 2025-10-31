@extends('layout')

@section('content')
<h2>Pelanggan: {{ $pelanggan->nama }}</h2>
<p>Email: {{ $pelanggan->email ?? '-' }} | Telepon: {{ $pelanggan->no_telepon ?? '-' }}</p>

<h3>Pesanan</h3>
<table>
  <thead>
    <tr><th>ID</th><th>Tanggal</th><th>Status</th><th>Total</th></tr>
  </thead>
  <tbody>
  @forelse($pelanggan->pesanans as $ps)
    <tr>
      <td><a href="{{ route('pesanan.show',$ps) }}">{{ $ps->id }}</a></td>
      <td>{{ $ps->tanggal_pesanan->format('Y-m-d') }}</td>
      <td>{{ $ps->status }}</td>
      <td>Rp{{ number_format($ps->total_harga ?? 0,0,',','.') }}</td>
    </tr>
  @empty
    <tr><td colspan="4">Belum ada pesanan.</td></tr>
  @endforelse
  </tbody>
</table>
@endsection
