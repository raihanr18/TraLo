<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Lupa Password?</h2>

            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif

            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            <!-- Form untuk mengirim OTP -->
            <form action="{{ route('sendOtp') }}" method="POST" onsubmit="return validateEmail()">
                @csrf
                <input type="text" name="email" placeholder="Masukan Email" value="{{ old('email') }}" required>
                <button type="submit">Kirim OTP</button>
                <p id="email-error">Email tidak valid.</p>
            </form>
            </form>
            <br>
            <br>

            <!-- Form untuk memverifikasi OTP -->
            <form action="{{ route('verifyOtp') }}" method="POST">
                @csrf
                <input type="text" name="otp" placeholder="Masukan Kode OTP" required>
                <button type="submit">Verifikasi OTP</button>
            </form>
            <br>
            <br>

            <!-- Tombol untuk kembali ke halaman login -->
            <a href="{{ route('login') }}">
                <button type="button">Back To Login</button>
            </a>
        </div>
    </div>
    <script src="js/custom-script.js"></script>
</body>

</html>

