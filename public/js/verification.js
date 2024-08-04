document.addEventListener('DOMContentLoaded', function() {
    const resendLink = document.getElementById('resend-link');
    const resendMessage = document.getElementById('resend-message');
    const timerElement = document.getElementById('timer');
    const timeElement = document.getElementById('time');

    let timeLeft = 2 * 60; // 2 minutes in seconds

    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timeElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        timeLeft--;

        if (timeLeft < 0) {
            clearInterval(timerInterval);
            timerElement.classList.add('hidden'); // Hide timer text
            resendMessage.classList.remove('hidden'); // Show resend code link
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);

    // Auto focus on next input
    const inputs = document.querySelectorAll('input[type="text"]');
    
    inputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            if (input.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        // Move focus back if input is empty
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && input.value === '' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

    // Collect and submit code values
    document.getElementById('verification-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Collect all input values
        const codeValues = Array.from(inputs).map(input => input.value).join('');
        
        // Create a hidden input to send the full code
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'token';
        hiddenInput.value = codeValues;
        this.appendChild(hiddenInput);
        
        // Submit the form
        this.submit();
    });

    resendLink.addEventListener('click', function(event) {
        event.preventDefault();
        // Add your resend code functionality here
    });
});