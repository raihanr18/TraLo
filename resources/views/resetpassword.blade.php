<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Reset Password?</h2>
            <form action="{{ route('resetPassword') }}" method="POST">
                @csrf
                
                <input type="password" name="password" placeholder="Password" value="">
                <input type="password" name="confirm password" placeholder="Confirm Password" value="">
                <br>
                <br>
                <br>
                <br>
                <br>
                <button type="submit">Verifikasi Email</button>
            </form>
        </div>
    </div>
</body>
</html>