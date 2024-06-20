<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Dashboard</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/myorder.css">
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
    <a href="#" class="w3-bar-item w3-button">Logout</a>
  </div>

  <div style="margin-left:20%">
    <div class="w3-container">
      <h2>My Orders</h2>

      <div class="ticket-card">
        <img src="img/view4.png" alt="Nama Wisata">
        <div class="ticket-details">
          <h3>Nama Wisata</h3>
          <p><i class="w3-text-grey">Alamat Wisata</i></p>
          <p>
            Alamat Wisata: Lembang<br>
            Jumlah Tiket: 2<br>
            Harga Tiket: Rp 200.000,00<br>
            Tanggal Kunjungan: Rab, 1 Mei 2024<br>
          </p>
        </div>
        <div class="ticket-actions left">
          <button class="w3-button w3-red w3-round-xxlarge">Batalkan Pemesanan</button>
        </div>
        <div class="ticket-actions right">
          <button class="w3-button w3-green w3-round-xxlarge">Lanjutkan Pembayaran</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
