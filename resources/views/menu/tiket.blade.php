@extends('master.master_menu')

@section('title', 'Tiket')

@section('konten')

<h2 class="text-4xl font-extrabold dark:text-white mb-8">Halaman Tiket</h2>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

{{-- Card Tiket --}}

<div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
    <div class="bg-gray-900 p-4 flex items-center">
        <img class="h-10 w-10 rounded-full mr-4" src="" alt="Logo">
        <h1 class="text-white text-2xl font-semibold">Nama Aplikasi</h1>
    </div>
    <img class="w-full h-56 object-cover object-center" src="" alt="Gambar">
    <div class="p-4">
        <h2 class="text-gray-800 font-bold text-xl mb-4"></h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-600">Nama Pemesan:</p>
                <p class="font-semibold"></p>
            </div>
            <div>
                <p class="text-gray-600">Jumlah Tiket:</p>
                <p class="font-semibold"></p>
            </div>
            <div>
                <p class="text-gray-600">Harga Tiket:</p>
                <p class="font-semibold"></p>
            </div>
            <div>
                <p class="text-gray-600">Tanggal Kunjungan:</p>
                <p class="font-semibold"></p>
            </div>
            <div>
                <p class="text-gray-600">Berlaku Tiket:</p>
                <p class="font-semibold"></p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 p-4">
        <p class="text-gray-700 text-center font-semibold">Nikmati perjalanan Anda!</p>
    </div>
</div>


@endsection