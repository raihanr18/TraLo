<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .payment-methods {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .payment-method input {
            margin-right: 10px;
        }
        .payment-method img {
            max-width: 100px;
            max-height: 50px;
        }
        .order-details {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .total-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="w3-container container">
    <div class="w3-card-4">
        <header class="w3-container w3-green w3-display-container">
            <button class="w3-button w3-white w3-border w3-border-green w3-round w3-display-left"><a href="{{ route('myorder') }}">Kembali</a></button>
            <h1 class="w3-right">Pilih Metode Pembayaran</h1>
        </header>

        <div class="w3-container payment-methods">
            <label class="payment-method">
                <input type="radio" name="payment" value="DANA">
                <img src="img/dana.jpeg" alt="DANA">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment" value="gopay">
                <img src="img/gopay.png" alt="gopay">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment" value="QRIS">
                <img src="img/qris.jpg" alt="QRIS">
            </label>
        </div>

        <div class="w3-container total-price">
            <span>Harga Total</span>
            <span>Rp 200.000,00</span>
        </div>

        <div class="w3-container">
            <button class="w3-button w3-green w3-block">Bayar</button>
        </div>

        <div class="w3-container order-details">
            <h3>No. Pesanan 110294456</h3>
            <p><strong>Alamat Wisata</strong></p>
            <p>Masa Berlaku Pesanan: Rabu, 1 Mei 2024</p>
            <p>Jumlah Tiket: 2</p>
            <hr>
            <p><strong>Tamu</strong></p>
            <p>Nama: (nama)</p>
            <p>Email: (email)</p>
        </div>
    </div>
</div>

</body>
</html>
