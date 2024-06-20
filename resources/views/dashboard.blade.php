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
        <div class="w3-container w3-padding-16 w3-white w3-border-bottom">
            <input type="text" class="w3-input w3-border w3-round" style="width:50%;display:inline-block;" placeholder="Search">
            <img src="img/logo.png" alt="Logo" class="w3-right" style="width:80px;">
        </div>

        <div class="w3-container">
            <h1>Mau wisata kemana hari ini?</h1>
            <div class="w3-row-padding">
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view4.png" alt="Nama Wisata 1" style="width:100%; height:200px; object-fit:cover; ">
                        <div class="w3-container w3-center">
                            <h2>Gunung Bohong</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view2.png" alt="Nama Wisata 2" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>Nama Wisata 2</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view3.png" alt="Nama Wisata 3" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>Nama Wisata 3</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view4.png" alt="Nama Wisata 4" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>Nama Wisata 4</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view4.png" alt="Nama Wisata 5" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>Nama Wisata 5</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="img/view4.png" alt="Nama Wisata 6" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>Nama Wisata 6</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large">Rp 100.000,00</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>        
</body>
</html>
