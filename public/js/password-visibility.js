document.querySelectorAll('.js-password-toggle').forEach(toggle => {
    toggle.addEventListener('click', function() {
        const passwordInput = toggle.previousElementSibling;
        const isPasswordVisible = passwordInput.type === 'text';

        passwordInput.type = isPasswordVisible ? 'password' : 'text';

        const iconPaths = toggle.querySelectorAll('.password-icon');
        if (isPasswordVisible) {
            iconPaths[0].setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z');
            iconPaths[1].setAttribute('d', 'M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.098.357-.254.699-.453 1.018m-1.06 1.435A9.961 9.961 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.961 9.961 0 01.453-1.018m1.06-1.435A9.961 9.961 0 0112 5c4.477 0 8.268 2.943 9.542 7-.098.357-.254.699-.453 1.018m-1.06 1.435A9.961 9.961 0 0112 19c-4.477 0-8.268-2.943-9.542-7');
        } else {
            iconPaths[0].setAttribute('d', 'M13.875 18.825l1.38 1.381a9.96 9.96 0 01-4.255.794c-4.477 0-8.268-2.943-9.542-7 .098-.357.254-.699.453-1.018m1.06-1.435A9.96 9.96 0 0112 5c1.462 0 2.854.267 4.123.757m2.064 1.348a10.05 10.05 0 012.847 3.002m-.287.405a9.961 9.961 0 01-2.355 4.445l1.38 1.38M4.219 4.219l15.563 15.563');
            iconPaths[1].setAttribute('d', '');
        }

        passwordInput.focus();
    });
});