document.addEventListener('DOMContentLoaded', function () {
    // Check authentication status on page load and redirect if authenticated
    // Skip auth check if this is a Google OAuth callback or password setup flow
    const urlParams = new URLSearchParams(window.location.search);
    const isPasswordSetup = document.body.dataset.passwordSetup === 'true';
    const isGoogleCallback = window.location.pathname.includes('auth/google-callback');

    if (isPasswordSetup || isGoogleCallback) {
        console.log('Skipping auth check for password setup or OAuth callback');
    } else {
        // Prevent page from being cached
        if ('caches' in window) {
            caches.keys().then(function (names) {
                names.forEach(function (name) {
                    caches.delete(name);
                });
            });
        }

        // Check authentication status
        fetch('/auth-status', {
            method: 'GET',
            headers: {
                'Cache-Control': 'no-cache',
                'Pragma': 'no-cache'
            },
            cache: 'no-store'
        })
            .then(response => response.json())
            .then(data => {
                if (data.authenticated && data.redirect_url) {
                    // User is authenticated, redirect them
                    window.location.replace(data.redirect_url);
                    return;
                }
            })
            .catch(error => {
                console.error('Auth status check failed:', error);
            });
    }

    // Handle browser back/forward navigation
    window.addEventListener('pageshow', function (event) {
        if (event.persisted && !isPasswordSetup && !isGoogleCallback) {
            // Page was loaded from cache, check auth status again
            fetch('/auth-status', {
                method: 'GET',
                headers: {
                    'Cache-Control': 'no-cache',
                    'Pragma': 'no-cache'
                },
                cache: 'no-store'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.authenticated && data.redirect_url) {
                        window.location.replace(data.redirect_url);
                    }
                });
        }
    });

    // Handle CSRF token refresh for forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            // Get fresh CSRF token before submitting
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const tokenInput = form.querySelector('input[name="_token"]');
                if (tokenInput) {
                    tokenInput.value = csrfToken.getAttribute('content');
                }
            }
        });
    });

    // Handle form switching functionality
    const signUpLink = document.getElementById('signUp');
    const signInLink = document.getElementById('signIn');
    const loginForm = document.getElementById('login-form');
    const signUpForm = document.getElementById('sign-up-form');
    const passwordSetupForm = document.getElementById('password-setup-form');

    // Function to clear form errors and values
    function clearErrors() {
        // Clear all error messages
        const errorMessages = document.querySelectorAll('.text-red-500');
        errorMessages.forEach(error => error.remove());

        // Remove error border classes
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.classList.remove('border-red-500');
        });

        // Clear input values (except hidden inputs and CSRF tokens)
        const formsToClear = [loginForm, signUpForm];
        formsToClear.forEach(form => {
            if (form) {
                const formInputs = form.querySelectorAll('input');
                formInputs.forEach(input => {
                    // Don't clear hidden inputs (like action, _token) or checkboxes
                    if (input.type !== 'hidden' && input.type !== 'checkbox') {
                        input.value = '';
                    }
                });
            }
        });
    }

    if (signUpLink) {
        signUpLink.addEventListener('click', function (e) {
            e.preventDefault();
            clearErrors();
            if (loginForm) loginForm.classList.add('hidden');
            if (signUpForm) signUpForm.classList.remove('hidden');
            if (passwordSetupForm) passwordSetupForm.classList.add('hidden');
        });
    }

    if (signInLink) {
        signInLink.addEventListener('click', function (e) {
            e.preventDefault();
            clearErrors();
            if (loginForm) loginForm.classList.remove('hidden');
            if (signUpForm) signUpForm.classList.add('hidden');
            if (passwordSetupForm) passwordSetupForm.classList.add('hidden');
        });
    }
});
