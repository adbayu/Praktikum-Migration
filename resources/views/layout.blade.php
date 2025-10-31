<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Demo Toko</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;margin:24px;}
    a{color:#2563eb;text-decoration:none}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #e5e7eb;padding:8px}
    th{background:#f3f4f6;text-align:left}
    .nav a{margin-right:12px}
  </style>
</head>
<body>
  <div class="nav">
    <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
    <a href="{{ route('produk.index') }}">Produk</a>
    <a href="{{ route('pesanan.index') }}">Pesanan</a>
    <a href="{{ route('detail-pesanan.index') }}">Detail Pesanan</a>
  </div>
  <hr>
  @yield('content')
</body>
</html>
