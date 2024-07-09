<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style1.css">
    <style>
        .profile-container {
            position: relative;
            display: inline-block;
        }

        .profile-container img {
            width: 80px;
            height: 80px;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            width: 80px;
            opacity: 0;
            transition: .5s ease;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 12px;
        }

        .profile-container:hover .overlay {
            opacity: 1;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    @include('sidebar')
    <div style="margin-left:20%">
        <div class="w3-container w3-padding-16">
            <form class="w3-container" style="width:150%" method="POST" action="{{ route('updateProfilePicture') }}" enctype="multipart/form-data">
                @csrf
                <h2>Profile</h2>
                <div class="profile-container">
                    <img src="{{ asset('profil/' . $user->foto) }}" alt="Profile" class="w3-circle">
                    <div class="overlay">
                        <a class="button" href="#" onclick="document.getElementById('profilePicInput').click(); return false;">Ubah Gambar</a>
                    </div>
                    <input type="file" id="profilePicInput" name="profile_picture" style="display:none;" accept="image/*">
                </div>
                <div id="fileName" class="file-name"></div>
                <br>
                <button class="w3-button w3-blue w3-margin-top" type="submit">Simpan</button>
                <h2>Account</h2>
                <label for="nama">Nama Lengkap</label>
                <input class="w3-input w3-border" type="text" id="nama" name="nama" readonly="readonly" value="{{ $user->name }}">
                <br>
                <label for="email">Email</label>
                <input class="w3-input w3-border" type="email" id="email" name="email" readonly="readonly" value="{{ $user->email }}">
            </form>
        </div>
    </div>

    <script>
        document.querySelector('.profile-container').addEventListener('click', function() {
            document.getElementById('profilePicInput').click();
        });

        document.getElementById('profilePicInput').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                document.getElementById('fileName').textContent = "File yang dipilih: " + file.name;
            } else {
                document.getElementById('fileName').textContent = "";
            }
        });
    </script>
</body>
</html>
