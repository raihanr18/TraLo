<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style>
        .sidebar {
            width: 20%;
            background-color: #f3f3f3;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
        }
        .sidebar .menu-item {
            margin: 20px 0;
            font-size: 18px;
            cursor: pointer;
            display: block;
        }
        .main-content {
            margin-left: 20%;
            padding: 20px;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-bar {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            width: 23%;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-info {
            padding: 10px;
            text-align: center;
        }
        .card-info h2 {
            margin: 10px 0;
            font-size: 18px;
        }
        .card-info a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    @include('sidebar')

    <div style="margin-left:20%">
        
        <div class="w3-container w3-padding-16 w3-white w3-border-bottom">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" class="w3-input w3-border w3-round" style="width:50%;display:inline-block;" placeholder="Search">
                <button type="submit" class="w3-button w3-green w3-border w3-border-green w3-round-large">Search</button>
                <img src="img/logo.png" alt="Logo" class="w3-right" style="width:80px;">
            </form>
        </div>

        <div class="w3-container">
            <h1>Mau wisata kemana hari ini?</h1>
            <div class="w3-row-padding">
                @foreach ($wisatas as $wisata)
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow">
                        <img src="{{ asset('img/' . $wisata->gambar_wisata) }}" alt="{{ $wisata->nama_wisata }}" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h2>{{ $wisata->nama_wisata }}</h2>
                            <button class="w3-button w3-green w3-border w3-border-green w3-round-large"> <a href="{{ route('membuatpesanan', ['id_wisata' => $wisata->id_wisata]) }}">  Rp {{ number_format($wisata->harga_wisata) }}</a></button>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>        
</body>
</html>
