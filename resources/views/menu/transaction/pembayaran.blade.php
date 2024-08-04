@extends('master.master_detail')

@section('title', 'Pembayaran')

@section('back-link', route('pesanan.page'))

@section('konten')
<div class="flex gap-8">
    <!-- Pilihan Metode Pembayaran -->
    <div class="w-full">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Pilih Metode Pembayaran</h2>
        <div class="flex flex-col gap-4">
            <label class="flex items-center border border-green-500 rounded-lg overflow-hidden">
                <input type="radio" name="payment-method" value="dana" id="dana" class="hidden peer">
                <div class="w-full p-4 flex items-center peer-checked:bg-green-500 peer-checked:text-white transition-colors">
                    <img src="{{ asset('img/dana.jpeg') }}" alt="Dana" class="h-10">
                    <span class="ml-4 text-lg">Dana</span>
                </div>
            </label>
            <label class="flex items-center border border-green-500 rounded-lg overflow-hidden">
                <input type="radio" name="payment-method" value="gopay" id="gopay" class="hidden peer">
                <div class="w-full p-4 flex items-center peer-checked:bg-green-500 peer-checked:text-white transition-colors">
                    <img src="{{ asset('img/gopay.png') }}" alt="Gopay" class="h-10">
                    <span class="ml-4 text-lg">Gopay</span>
                </div>
            </label>
            <label class="flex items-center border border-green-500 rounded-lg overflow-hidden">
                <input type="radio" name="payment-method" value="qris" id="qris" class="hidden peer">
                <div class="w-full p-4 flex items-center peer-checked:bg-green-500 peer-checked:text-white transition-colors">
                    <img src="{{ asset('img/qris.jpg') }}" alt="QRIS" class="h-10">
                    <span class="ml-4 text-lg">QRIS</span>
                </div>
            </label>
        </div>
        <!-- Total Harga -->
        <div class="mt-6 p-4 bg-gray-100 rounded-lg shadow-md flex justify-between">
            <span class="text-xl font-semibold text-gray-700">Harga Total</span>
            <span class="text-xl font-bold text-gray-800">Rp {{ number_format($tiket->total_harga, 2, ',', '.') }}</span>
        </div>
        <button id="payment-button" type="button" class="mt-4 w-full bg-green-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
            Pilih Pembayaran
        </button>
    </div>

    <!-- Detail Pesanan -->
    <div class="w-1/3">
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">No. Pesanan {{ $tiket->no_pesanan }}</h2>
            <p class="text-lg font-medium text-gray-800">DETAIL PESANAN</p>
            <p class="text-sm text-gray-600">{{ $tiket->tempatWisata->nama ?? 'Lokasi tidak tersedia' }} - {{ $tiket->tempatWisata->lokasi ?? 'Lokasi tidak tersedia' }}</p>
            <p class="text-sm text-gray-600">Masa Berlaku Pesanan: {{ $tiket->waktu_kunjung->translatedFormat('D, d M Y') }}</p>
            <p class="text-sm text-gray-600">Jumlah Tiket: {{ $tiket->kuantitas }}</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentButtons = document.querySelectorAll('input[name="payment-method"]');
        const paymentButton = document.getElementById('payment-button');

        function updateButtonText() {
            const selectedPaymentMethod = document.querySelector('input[name="payment-method"]:checked');
            if (selectedPaymentMethod) {
                const method = selectedPaymentMethod.value;
                paymentButton.textContent = `Bayar Dengan ${method.charAt(0).toUpperCase() + method.slice(1)}`;
            } else {
                paymentButton.textContent = 'Pilih Pembayaran';
            }
        }

        paymentButtons.forEach(button => {
            button.addEventListener('change', updateButtonText);
        });

        // Set default button text
        updateButtonText();
    });
</script>
@endsection