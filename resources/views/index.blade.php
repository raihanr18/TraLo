<!DOCTYPE html>
<html>
<head>
    <title>TraLo | Wisata Pilihan Anda</title>
    
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="h-screen m-0 font-urbanist">

    <div class="relative h-full">
        <img src="img/asset/gambar_1.jpg" alt="Image 1" class="w-1/3 h-full float-left object-cover">
        <img src="img/asset/gambar_2.jpg" alt="Image 2" class="w-1/3 h-full float-left object-cover">
        <img src="img/asset/gambar_3.jpg" alt="Image 3" class="w-1/3 h-full float-left object-cover">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-55 flex justify-center items-center text-white text-5xl sm:text-8xl font-bold">
            Selamat Datang
        </div>
        <div class="absolute top-2.5 left-2.5">
            <a href="{{ route('index') }}">
                <img src="img/logo.png" alt="Logo" class="h-12 sm:h-16 w-auto brightness-150">
            </a>
        </div>

        <div class="absolute top-2.5 right-2.5 flex space-x-2 font-urbanist">
            <a href="{{ route('signup') }}" class="ml-2 px-4 py-2 w-24 sm:w-28 text-center rounded-full border-2 border-transparent text-white no-underline font-bold bg-transparent hover:border-white transition duration-300">
                Daftar
            </a>
            <a href="{{ route('login') }}" class="ml-2 px-4 py-2 w-24 sm:w-28 text-center rounded-full bg-white text-black no-underline font-bold transition duration-300 transform hover:bg-gray-200">
                Masuk
            </a>
        </div>
    </div>

    <!-- Tagline -->
    <section class="bg-cover bg-center h-screen" style="background-image: url('img/asset/gambar_hero.jpg');">
        <div class="flex items-center justify-center h-full w-full bg-black bg-opacity-50">
            <div class="text-center text-white">
                <h1 class="text-5xl sm:text-6xl font-bold mb-6">Jelajahi Keindahan Bumi Pasundan</h1>
                <p class="text-lg sm:text-2xl mb-8">Temukan destinasi favorit kamu dengan kami</p>
                <a href="{{route('login')}}" class="px-6 py-3 bg-white text-black font-bold rounded-full text-lg sm:text-xl transition duration-300 hover:bg-gray-200">
                    Mulai Eksplorasi
                </a>
            </div>
        </div>
    </section>

    <!-- Keunggulan -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Temukan Keajaiban Wisata Anda</h2>
                <p class="text-gray-600 mt-4">Nikmati liburan tak terlupakan dengan fitur-fitur istimewa kami</p>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                        <img src="img/icon/plan.png" alt="Rencanakan Liburan" class="w-16 h-16 mb-4">
                        <h3 class="text-2xl font-bold mb-2 text-center">Rencanakan Liburan Anda</h3>
                        <p class="text-gray-600 text-center">Rencanakan perjalanan Anda dengan mudah dan pilih tujuan favorit   kapan saja.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                        <img src="img/icon/family-trip.png" alt="Nikmati Liburan" class="w-16 h-16 mb-4">
                        <h3 class="text-2xl font-bold mb-2 text-center">Nikmati Liburan Anda</h3>
                        <p class="text-gray-600 text-center">Rasakan pengalaman liburan yang memukau dan jelajahi keindahan yang belum pernah Anda lihat.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                        <img src="img/icon/explore.png" alt="Jelajahi Destinasi" class="w-16 h-16 mb-4">
                        <h3 class="text-2xl font-bold mb-2 text-center">Jelajahi Destinasi</h3>
                        <p class="text-gray-600 text-center">Temukan destinasi menarik dan simpan rencana perjalanan Anda dengan mudah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Galeri Wisata -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Galeri Wisata</h2>
                <p class="text-gray-600 mt-4">Lihatlah beberapa destinasi menakjubkan yang kami tawarkan</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_1.jpg" alt="Destinasi 1" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Green Canyon - Pangandaran</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_2.png" alt="Destinasi 2" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Taman Sakura - Kebun Raya Cibodas</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_3.jpg" alt="Destinasi 3" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Stone Garden - Cipatat</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_4.jpg" alt="Destinasi 4" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Kawah Putih - Bandung</p>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_5.jpg" alt="Destinasi 5" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Curug Cikaso - Sukabumi</p>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="relative overflow-hidden rounded-lg shadow-lg group">
                    <img src="img/galeri/wisata_6.jpg" alt="Destinasi 6" class="w-full h-64 object-cover transition-transform duration-300  group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center  transition-opacity duration-300">
                        <p class="text-white text-lg">Telaga Remis - Kuningan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang kami -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Tentang Kami</h2>
                <p class="text-gray-600 mt-4">Kami adalah agen perjalanan yang menyediakan pengalaman wisata lokal terbaik.</p>
            </div>
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-1/2 lg:w-1/2 px-4 mb-8">
                    <img src="img/logo.png" alt="About Us" class="w-1/2 h-auto rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/2 lg:w-1/2 px-4 mb-8">
                    <p class="text-lg text-gray-700">Kami telah berpengalaman dalam merancang paket wisata yang sesuai dengan keinginan dan anggaran Anda. Tim kami siap membantu Anda merencanakan perjalanan yang tak terlupakan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Apa Kata Mereka</h2>
                <p class="text-gray-600 mt-4">Testimoni dari para pengguna kami</p>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600 mb-4">"Layanan yang sangat bagus dan membantu! Saya sangat puas dengan hasilnya."</p>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <p class="text-gray-800 font-bold">John Doe</p>
                                <p class="text-gray-600">CEO, Lorem Company</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600 mb-4">"Platform yang luar biasa, sangat mudah digunakan dan memberikan hasil yang sangat baik."</p>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <p class="text-gray-800 font-bold">Jane Smith</p>
                                <p class="text-gray-600">CTO, Ipsum Company</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600 mb-4">"Sangat merekomendasikan layanan ini, benar-benar mengubah cara kami bekerja."</p>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <p class="text-gray-800 font-bold">Michael Johnson</p>
                                <p class="text-gray-600">CFO, Dolor Company</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="bg-gray-300 py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Kontak Kami</h2>
                <p class="text-gray-600 mt-4">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Alamat</h3>
                        <p class="text-gray-600"> Jalan Dipatiukur No. 112-116, Coblong, Lebakgede, Bandung, Jawa Barat, 40132</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Telepon</h3>
                        <p class="text-gray-600">+62 123 456 789</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-4">Email</h3>
                        <p class="text-gray-600">tralo@wisataindah.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 TraLo. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
