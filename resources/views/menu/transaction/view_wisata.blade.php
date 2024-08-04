@extends('master.master_detail')

@section('title', 'Wisata')

@section('back-link', route('dashboard'))

@section('konten')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        #calendar-container {
            display: none; /* Pastikan kalender tersembunyi saat halaman dimuat */
            position: absolute;
            top: 100%; /* Posisi relatif terhadap elemen sebelumnya */
            left: 0;
            z-index: 10; /* Pastikan kalender berada di atas elemen lain */
        }
    </style>
</head>

<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold mb-4">Detail Wisata</h1>
    <div class="flex flex-wrap lg:flex-nowrap">
        <!-- Detail Wisata -->
        <div class="lg:w-1/2 p-4">
            <img id="wisata-image" src="{{ asset('storage/' . $wisata->foto) }}" alt="{{ $wisata->nama }}" class="w-full h-64 object-cover rounded-lg shadow-lg mb-4">
            <h2 id="wisata-name" class="text-2xl font-semibold text-gray-800">{{ $wisata->nama }}</h2>
            <p id="wisata-description" class="text-gray-600 mt-2">{{ $wisata->deskripsi }}</p>
            <p id="wisata-location" class="text-gray-600 mt-2">Lokasi: {{ $wisata->lokasi }}</p>
            <p id="wisata-price" class="text-gray-600 mt-2">Harga Tiket: Rp {{ number_format($wisata->harga, 0, ',', '.') }}</p>
            <p id="wisata-opening-hours" class="text-gray-600 mt-2">Waktu Buka: {{ $wisata->waktu_buka }}</p>
            <p id="wisata-closing-hours" class="text-gray-600 mt-2">Waktu Tutup: {{ $wisata->waktu_tutup }}</p>
            <p id="wisata-contact" class="text-gray-600 mt-2">Kontak: {{ $wisata->kontak }}</p>
        </div>

        <!-- Form Pesan Tiket -->
        <div class="lg:w-1/2 p-4 relative">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Pesan Tiket</h3>

            <form action="{{ route('pesan.wisata') }}" method="POST">
                @csrf
                <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                <div class="mb-6">
                    <p class="text-gray-600 mb-2">Pilih Tanggal:</p>
                    <div class="flex flex-wrap gap-2 mb-4" id="date-buttons">
                        @foreach ($nextDates as $date)
                            <input type="radio" id="date-{{ $date->format('Y-m-d') }}" name="tanggal" value="{{ $date->format('Y-m-d') }}" class="hidden" />
                            <label for="date-{{ $date->format('Y-m-d') }}" class="cursor-pointer text-green-700 border border-green-700 rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 transition-colors duration-300 ease-in-out">
                                {{ $date->format('d M Y') }}
                            </label>
                        @endforeach
                        <button type="button" id="calendar-button" class="relative text-gray-900 border border-gray-900 hover:bg-gray-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-500 dark:text-gray-500 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-800">
                            Buka Kalender
                        </button>
                    </div>
                    <div id="calendar-container" class="absolute bg-white border border-gray-300 rounded-lg shadow-lg p-4"></div>
                    <p id="selected-date" class="text-gray-600 mt-2">Tanggal yang dipilih: <span id="date-display">-</span></p>
                    <input type="hidden" name="waktu_kunjung" id="selected-date-input">
                    
                </div>

                <div class="mb-6">
                    <label for="kuantitas" class="block text-gray-600 mb-2">Jumlah Tiket:</label>
                    <div class="flex items-center space-x-2">
                        <button type="button" id="decrement" class="bg-gray-200 text-gray-600 font-semibold px-4 py-2 rounded-l-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            -
                        </button>
                        <input type="number" name="kuantitas" id="kuantitas" class="w-16 border-gray-300 rounded-md shadow-sm text-center focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" value="1">
                        <button type="button" id="increment" class="bg-gray-200 text-gray-600 font-semibold px-4 py-2 rounded-r-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            +
                        </button>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Buat Pesanan
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const dateDisplay = document.getElementById('date-display');
    const dateInput = document.getElementById('selected-date-input');
    const calendarContainer = document.getElementById('calendar-container');
    const dateButtons = document.querySelectorAll('#date-buttons input[type="radio"]');
    const labels = document.querySelectorAll('#date-buttons label');
    const incrementButton = document.getElementById('increment');
    const decrementButton = document.getElementById('decrement');
    const quantityInput = document.getElementById('kuantitas');
    let calendarInstance;

    function formatDate(date) {
        return date.toISOString().split('T')[0];
    }

    function updateDisplay(date) {
        dateDisplay.textContent = new Date(date).toLocaleDateString('id-ID');
        dateInput.value = formatDate(new Date(date));
    }

    function addDays(date, days) {
        const result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    function handleDateSelection(date) {
        // Hapus gaya dari semua label
        labels.forEach(label => {
            label.classList.remove('bg-green-800', 'text-white', 'border-green-800');
            label.classList.add('text-green-700', 'border-green-700');
        });

        // Temukan radio button dan label yang sesuai
        const selectedButton = Array.from(dateButtons).find(button => button.value === date);
        if (selectedButton) {
            selectedButton.checked = true; // Pastikan radio button dipilih
            const associatedLabel = document.querySelector(`label[for="${selectedButton.id}"]`);
            if (associatedLabel) {
                associatedLabel.classList.add('bg-green-800', 'text-white', 'border-green-800');
                associatedLabel.classList.remove('text-green-700', 'border-green-700');
                updateDisplay(date);
            }
        } else {
            // Handle case where no matching radio button is found
            dateDisplay.textContent = new Date(date).toLocaleDateString('id-ID');
            dateInput.value = formatDate(new Date(date));
        }
    }

    function toggleCalendar() {
        const isCalendarVisible = calendarContainer.style.display === 'block';
        if (isCalendarVisible) {
            calendarContainer.style.display = 'none';
            if (calendarInstance) {
                calendarInstance.destroy();
                calendarInstance = null;
            }
        } else {
            calendarContainer.style.display = 'block';
            calendarInstance = flatpickr(calendarContainer, {
                inline: true,
                dateFormat: 'Y-m-d',
                onChange: function(selectedDates) {
                    if (selectedDates.length > 0) {
                        const selectedDate = selectedDates[0];
                        const newDate = addDays(selectedDate, 1); // Menambah 1 hari
                        const formattedDate = formatDate(newDate);
                        handleDateSelection(formattedDate);
                    }
                }
            });
        }
    }

    // Event listener untuk tombol kalender
    document.getElementById('calendar-button').addEventListener('click', (event) => {
        event.stopPropagation();
        toggleCalendar();
    });

    // Event listener untuk klik di luar kalender
    document.addEventListener('click', (event) => {
        if (calendarContainer.style.display === 'block' && !calendarContainer.contains(event.target) && !event.target.matches('#calendar-button')) {
            calendarContainer.style.display = 'none';
            if (calendarInstance) {
                calendarInstance.destroy();
                calendarInstance = null;
            }
        }
    });

    // Event listener untuk perubahan pada radio buttons
    dateButtons.forEach(button => {
        button.addEventListener('change', () => {
            handleDateSelection(button.value);
        });
    });

    // Inisialisasi pemilihan tanggal awal jika ada
    const initialSelectedDate = dateInput.value;
    if (initialSelectedDate) {
        handleDateSelection(initialSelectedDate);
    }

    // Event listeners untuk tombol plus dan minus
    incrementButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value, 10);
        quantityInput.value = isNaN(currentValue) ? 1 : currentValue + 1;
    });

    decrementButton.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value, 10);
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });
});


</script>

@endsection