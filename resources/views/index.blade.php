<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background-images">
        <img src="img/view1.png" alt="Image 1">
        <img src="img/view2.png" alt="Image 2">
        <img src="img/view3.png" alt="Image 3">
        <div class="overlay">
            Selamat Datang
        </div>
        <div class="top-left">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="top-right">
            <a href="{{ route('signup') }}" class="w3-button w3-white w3-border w3-round">Sign Up</a>
            <a href="{{ route('login') }}" class="w3-button w3-white w3-border w3-round">Login</a>
        </div>
    </div>
</body>
</html>
