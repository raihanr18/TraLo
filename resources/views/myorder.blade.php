<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/myorder.css">
</head>
<body>
    @include('sidebar')

    <div style="margin-left:20%">
        <div class="w3-container">
            <h2>My Orders</h2>

            @foreach ($pesanTikets as $pesanTiket)
                <div class="ticket-card">
                    <img src="{{ asset('img/' . $pesanTiket->wisata->gambar_wisata) }}" alt="{{ $pesanTiket->wisata->nama_wisata }}">
                    <div class="ticket-details">
                        <h3>{{ $pesanTiket->wisata->nama_wisata }}</h3>
                        <p><i class="w3-text-grey">{{ $pesanTiket->wisata->alamat_wisata }}</i></p>
                        <p>
                            Alamat Wisata: {{ $pesanTiket->wisata->alamat_wisata }}<br>
                            Jumlah Tiket: {{ $pesanTiket->jumlah_tiket }}<br>
                            Harga Tiket: Rp {{ number_format($pesanTiket->harga_total, 2) }}<br>
                            Tanggal Kunjungan: {{ $pesanTiket->tanggal_kunjungan }}<br>
                        </p>
                    </div>
                    <div class="ticket-actions left">
                        <form action="{{ route('batalkanPemesanan', ['id' => $pesanTiket->id_pesan]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="w3-button w3-red w3-round-xxlarge">Batalkan Pemesanan</button>
                        </form>
                    </div>
                    <div class="ticket-actions right">
                        <button class="w3-button w3-green w3-round-xxlarge"><a href="{{ route('metodepembayaran', ['id_pesan' => $pesanTiket->id_pesan]) }}">Lanjutkan Pembayaran</a></button>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</body>
</html>
