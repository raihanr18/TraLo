<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Dashboard</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    <div class="w3-container w3-padding-16 w3-center">
      <img src="img/logo.png" alt="Profile" class="w3-circle" style="width:80px;height:80px;">
      <h4>Username</h4>
    </div>
    <a href="{{ route('dashboard') }}" class="w3-bar-item w3-button">Dashboard</a>
    <a href="{{ route('myticket') }}" class="w3-bar-item w3-button">My Tickets</a>
    <a href="{{ route('myorder') }}" class="w3-bar-item w3-button">My Orders</a>
    <a href="{{ route('myaccount') }}" class="w3-bar-item w3-button">Account</a>
    <a href="{{ route('login') }}" class="w3-bar-item w3-button">Logout</a>
  </div>

  <div style="margin-left:20%">
    <div class="w3-container">
      <h2>My Tickets</h2>

      @foreach ($pesanTikets as $pesanTiket)
        <div class="ticket-card">
          <img src="{{ asset('img/' . $pesanTiket->wisata->gambar_wisata) }}" alt="Nama Wisata">
          <div class="ticket-details">
            <h3>{{ $pesanTiket->wisata->nama_wisata }}</h3>
            <p><i class="w3-text-grey">{{ $pesanTiket->wisata->alamat_wisata }}</i></p>
            <p>
              {{ auth()->user()->name }}<br>
              {{ $pesanTiket->jumlah_tiket }}<br>
              Rp {{ number_format($pesanTiket->harga_total, 2) }}<br>
              {{ $pesanTiket->tanggal_kunjungan }}<br>
            </p>
          </div>
          <div class="ticket-actions">
            @if ($pesanTiket->status_pembayaran == 'dibatalkan')
              <button class="w3-button w3-red w3-round">{{ $pesanTiket->status_pembayaran }}</button>
            @elseif ($pesanTiket->status_pembayaran == 'dibayar')
              <button class="w3-button w3-green w3-round">{{ $pesanTiket->status_pembayaran }}</button>
            @else
              <button class="w3-button w3-round">{{ $pesanTiket->status_pembayaran }}</button>
            @endif
          </div>
        </div>
      @endforeach

      
    </div>
  </div>
  
</body>
</html>
