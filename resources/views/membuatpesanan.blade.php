<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Booking</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/pesan.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .ticket-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .ticket-section img {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }
        .ticket-count {
            display: flex;
            align-items: center;
        }
        .ticket-count input {
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="w3-container container">
    <div class="w3-card-4">
        <header class="w3-container w3-green w3-display-container">
            <button class="w3-button w3-red w3-border w3-border-green w3-round w3-display-left"><a href="{{ route('dashboard') }}">kembali</a></button>
            <h1 class="w3-right">Wisata Booking</h1>
        </header>

        <form method="POST" action="{{ route('store.order') }}" onsubmit="return validateForm()">
            @csrf

            <input type="hidden" name="id_wisata" value="{{ $wisata->id_wisata }}">

            <div class="w3-container ticket-section">
                <div>
                    <img src="{{ asset('img/' . $wisata->gambar_wisata) }}" alt="{{ $wisata->nama_wisata }}">
                </div>
                <div>
                    <h2>{{ $wisata->nama_wisata }}</h2>
                    <p>{{ $wisata->alamat_wisata }}</p>
                    <p>{{ $wisata->deskripsi_wisata }}</p>
                </div>
            </div>

            <div class="w3-container">
                <div class="ticket-section">
                    <label for="tanggal_kunjungan">Pilih Tanggal:</label>
                    <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" onchange="updateTotalPrice()">
                </div>
            </div>

            <div class="w3-container ticket-section">
                <div>
                    <p>Harga Tiket: Rp {{ number_format($wisata->harga_wisata) }}</p>
                </div>
                <div class="ticket-count">
                    <button type="button" class="w3-button w3-light-grey" onclick="decreaseTicketCount()">-</button>
                    <input type="number" id="jumlah_tiket" name="jumlah_tiket" value="1" min="1" onchange="updateTotalPrice()">
                    <button type="button" class="w3-button w3-light-grey" onclick="increaseTicketCount()">+</button>
                </div>
            </div>

            <div class="w3-container">
                <h3>Harga Total: Rp <span id="harga_total">{{ number_format($wisata->harga_wisata) }}</span></h3>
                <h3>Tiket Untuk Tanggal: <span id="tanggal_kunjungan-text"></span></h3>
            </div>

            <footer class="w3-container w3-green w3-padding">
                <button type="submit" class="w3-button w3-white w3-border w3-border-green w3-round w3-right">Buat Pesanan</button>
                <div id="error-message" style="color: white; font-weight: bold;"></div>
            </footer>
        </form>
    </div>
</div>

<script>
    function validateForm() {
        const selectedDate = document.getElementById("tanggal_kunjungan").value;
        if (!selectedDate) {
            const errorMessage = document.getElementById("error-message");
            errorMessage.textContent = "Silakan pilih tanggal kunjungan.";
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
    const ticketPrice = {{ $wisata->harga_wisata }};

    function updateTotalPrice() {
        const selectedDate = document.getElementById("tanggal_kunjungan").value;
        document.getElementById("tanggal_kunjungan-text").textContent = selectedDate;
        const ticketCount = document.getElementById("jumlah_tiket").value;
        const totalPrice = ticketPrice * ticketCount;
        document.getElementById("harga_total").textContent = totalPrice.toLocaleString('id-ID');
    }

    function decreaseTicketCount() {
        const ticketCountInput = document.getElementById("jumlah_tiket");
        let ticketCount = parseInt(ticketCountInput.value);
        if (ticketCount > 1) {
            ticketCount--;
            ticketCountInput.value = ticketCount;
            updateTotalPrice();
        }
    }

    function increaseTicketCount() {
        const ticketCountInput = document.getElementById("jumlah_tiket");
        let ticketCount = parseInt(ticketCountInput.value);
        ticketCount++;
        ticketCountInput.value = ticketCount;
        updateTotalPrice();
    }

    updateTotalPrice();
</script>

</body>
</html>
