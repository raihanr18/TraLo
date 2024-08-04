@extends('master.master_menu')

@section('title', 'Menu Utama')
    
@section('konten')
<div class="flex items-center justify-between p-4 rounded-lg mb-6">
    <form action="{{ route('search') }}" method="GET" class="flex items-center w-full">
        @csrf
        <div class="relative text-gray-600 flex-grow mr-4">
            <input type="search" name="search" placeholder="Cari wisata kamu" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
            <button type="submit" class="absolute right-0 top-0 mt-2 mr-3">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                </svg>
            </button>
        </div>
        <img src="img/logo.png" alt="Logo" class="w-20">
    </form>
</div>

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Mau wisata kemana hari ini?</h1>
    <div class="flex flex-wrap -mx-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($wisatas as $wisata)
                <a href="{{ route('view.wisata', $wisata->id) }}" class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('storage/' . $wisata->foto) }}" alt="{{ $wisata->nama }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $wisata->nama }}</h2>
                        <p class="text-gray-600 mt-2">Harga Tiket: Rp {{ number_format($wisata->harga, 0, ',', '.') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection