function validateEmail() {
    const emailField = document.querySelector('input[name="email"]');
    const emailValue = emailField.value;
    const errorMessage = document.getElementById('email-error');

    if (!emailValue.endsWith('@gmail.com')) {
        errorMessage.style.display = 'block';
        return false;
    } else {
        errorMessage.style.display = 'none';
        return true;
    }
}
