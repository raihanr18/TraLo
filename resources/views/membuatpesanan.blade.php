<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Booking</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/pesan.css">
</head>
<body>

<div class="w3-container container">
    <div class="w3-card-4">
        <header class="w3-container w3-green w3-display-container">
            <button class="w3-button w3-red w3-border w3-border-green w3-round w3-display-left"><a href="{{ route('dashboard') }}">kembali</a></button>
            <h1 class="w3-right">Wisata Booking</h1>
        </header>

        <div class="w3-container ticket-section">
            <div>
                <img src="img/view1.png" alt="Nama Wisata">
            </div>
            <div>
                <h2>Nama Wisata</h2>
                <p>Alamat Wisata</p>
                <p>Deskripsi Wisata</p>
            </div>
        </div>

        <div class="w3-container">
            <div class="calendar-section" id="calendar-section">
                <button class="w3-button w3-circle w3-green" onclick="prevWeek()">&lt;</button>
                <button class="w3-button w3-light-grey" id="day1" onclick="selectDate(this)"><br></button>
                <button class="w3-button w3-light-grey" id="day2" onclick="selectDate(this)"><br></button>
                <button class="w3-button w3-light-grey" id="day3" onclick="selectDate(this)"><br></button>
                <button class="w3-button w3-light-grey" id="day4" onclick="selectDate(this)"><br></button>
                <button class="w3-button w3-light-grey" id="day5" onclick="selectDate(this)"><br></button>
                <button class="w3-button w3-circle w3-green" onclick="nextWeek()">&gt;</button>
            </div>
        </div>

        <div class="w3-container ticket-section">
            <div>
                <p>Harga Tiket: Rp 100.000,00</p>
            </div>
            <div class="ticket-count">
                <button class="w3-button w3-light-grey" onclick="decreaseTicketCount()">-</button>
                <input type="number" id="ticket-count" value="1" min="1" onchange="updateTotalPrice()">
                <button class="w3-button w3-light-grey" onclick="increaseTicketCount()">+</button>
            </div>
        </div>

        <div class="w3-container">
            <h3>Harga Total: Rp <span id="total-price">100.000,00</span></h3>
            <h3>Tiket Untuk Tanggal: <span id="selected-date"></span></h3>
        </div>

        <footer class="w3-container w3-green w3-padding">
            <button class="w3-button w3-white w3-border w3-border-green w3-round w3-right"><a href="{{ route('myorder') }}">Buat Pesanan</a></button>
        </footer>
    </div>
</div>

<script>
    let currentWeekStart = new Date();
    const ticketPrice = 100000;

    function updateCalendar() {
        const days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        for (let i = 0; i < 5; i++) {
            const date = new Date(currentWeekStart);
            date.setDate(currentWeekStart.getDate() + i);
            document.getElementById(`day${i + 1}`).innerHTML = `${days[date.getDay()]}<br>${date.getDate()} ${date.toLocaleString('id-ID', { month: 'short' })} ${date.getFullYear()}`;
        }
    }

    function prevWeek() {
        currentWeekStart.setDate(currentWeekStart.getDate() - 5);
        updateCalendar();
    }

    function nextWeek() {
        currentWeekStart.setDate(currentWeekStart.getDate() + 5);
        updateCalendar();
    }

    function updateTotalPrice() {
        const ticketCount = document.getElementById("ticket-count").value;
        const totalPrice = ticketPrice * ticketCount;
        document.getElementById("total-price").textContent = totalPrice.toLocaleString('id-ID', { minimumFractionDigits: 2 });
    }

    function decreaseTicketCount() {
        const ticketCountInput = document.getElementById("ticket-count");
        let ticketCount = parseInt(ticketCountInput.value);
        if (ticketCount > 1) {
            ticketCount--;
            ticketCountInput.value = ticketCount;
            updateTotalPrice();
        }
    }

    function increaseTicketCount() {
        const ticketCountInput = document.getElementById("ticket-count");
        let ticketCount = parseInt(ticketCountInput.value);
        ticketCount++;
        ticketCountInput.value = ticketCount;
        updateTotalPrice();
    }

    function selectDate(button) {
        const selectedDate = button.innerHTML.split('<br>').join(' ');
        document.getElementById("selected-date").textContent = selectedDate;
    }

    updateCalendar();
    updateTotalPrice();
</script>

</body>
</html>
