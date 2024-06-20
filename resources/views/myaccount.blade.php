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
        <a href="#" class="w3-bar-item w3-button">Logout</a>
    </div>

    <div style="margin-left:20%">
        <div class="w3-container w3-padding-16">
            <h2>Account</h2>
            <form class="w3-container">
                <label for="nama">Nama Lengkap</label>
                <input class="w3-input w3-border" type="text" id="nama" name="nama" readonly="readonly" value="Antonio">

                <label for="email">Email</label>
                <input class="w3-input w3-border" type="email" id="email" name="email" readonly="readonly" value="Antonio@gmail.com">
            </form>
        </div>
    </div>
</body>
</html>
