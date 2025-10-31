@extends('layout')

@section('content')
<h2>Daftar Pelanggan</h2>
<table>
  <thead>
    <tr><th>ID</th><th>Nama</th><th>Email</th><th>No. Telp</th><th>Jumlah Pesanan</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td><a href="{{ route('pelanggan.show',$p) }}">{{ $p->nama }}</a></td>
      <td>{{ $p->email ?? '-' }}</td>
      <td>{{ $p->no_telepon ?? '-' }}</td>
      <td>{{ $p->pesanans_count }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
