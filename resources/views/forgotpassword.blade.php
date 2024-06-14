<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Lupa Password?</h2>
            <form action="{{ route('resetPassword') }}" method="POST">
                @csrf
                
                <input type="text" name="email" placeholder="Email Address" value="{{ old('email') }}">
                <br>
                <br>
                <br>
                <br>
                <br>
                <button type="submit">Verifikasi Email</button>
            </form>
            <a href="{{ route('login') }}">
            <button type="submit">Back To Login</button>
            </a>
        </div>
    </div>
</body>
</html>
