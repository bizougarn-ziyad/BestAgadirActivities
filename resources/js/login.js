document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');
    const signUpForm = document.getElementById('sign-up-form');
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');

    function clearErrors() {
        // Clear all error messages
        const errorMessages = document.querySelectorAll('.text-red-500');
        errorMessages.forEach(error => error.remove());

        // Remove error border classes
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.classList.remove('border-red-500');
        });

        // Clear input values
        const forms = [loginForm, signUpForm];
        forms.forEach(form => {
            if (form) {
                const formInputs = form.querySelectorAll('input');
                formInputs.forEach(input => {
                    input.value = '';
                });
            }
        });
    }

    signUpButton.addEventListener('click', function (e) {
        e.preventDefault();
        clearErrors();
        loginForm.classList.add('hidden');
        signUpForm.classList.remove('hidden');
    });

    signInButton.addEventListener('click', function (e) {
        e.preventDefault();
        clearErrors();
        signUpForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
    });
});