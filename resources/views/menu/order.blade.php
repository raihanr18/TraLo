@extends('master.master_menu')

@section('title', 'Pesanan')

@section('konten')

<h2 class="text-4xl font-extrabold dark:text-white">Halaman Pesanan</h2>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

@foreach ($tikets as $tiket)
{{-- Card Tiket --}}
<div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex mb-4">
    <img class="w-1/3 h-auto object-cover object-center" src="{{ asset('storage/' . $tiket->tempatWisata->foto) }}" alt="Gambar Wisata">
    <div class="w-2/3 p-4 flex flex-col">
        <div>
            <h2 class="text-gray-800 font-bold text-2xl mb-1">{{ $tiket->tempatWisata->nama }}</h2>
            <p class="text-gray-600 mb-4">{{ $tiket->tempatWisata->lokasi }}</p>
        </div>
        <div class="mt-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Tanggal Kunjungan:</p>
                    <p class="font-semibold">{{ $tiket->waktu_kunjung->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Jumlah Tiket:</p>
                    <p class="font-semibold">{{ $tiket->kuantitas }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Berlaku Tiket:</p>
                    <p class="font-semibold">{{ $tiket->waktu_kunjung->format('d M Y') }}</p>
                </div>
            </div>
            <div class="flex justify-between mt-6 space-x-4">
                <!-- Status Bayar Button -->
                <button type="button" class="bg-gray-300 text-gray-800 py-2 px-4 rounded-lg cursor-not-allowed" disabled>
                    {{ ucfirst($tiket->status_pembayaran) }}
                </button>
                
                <!-- Action Buttons -->
                <div class="flex space-x-4">
                    <form action="{{ route('pesanan.batal', $tiket->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin membatalkan pesanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Batalkan Pesanan</button>
                    </form>                    

                    <form action="{{ route('pesanan.lanjutkan', $tiket->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                            Lanjutkan Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
