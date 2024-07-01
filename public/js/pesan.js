
    let currentWeekStart = new Date();
    const ticketPrice = {{ $wisata->harga_wisata }};

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
