import './bootstrap';


//------swiper-------//
// Only initialize Swiper if the element exists
const swiperElement = document.querySelector(".mySwiper");
if (swiperElement) {
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });
}


//--------MobileMenu--------//

document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const navbar = document.querySelector('nav');

    // Only run if elements exist
    if (mobileMenuButton && mobileMenu && navbar) {
        const originalShadow = 'shadow-[0_1px_25px_rgba(0,0,0,0.1)]';

        mobileMenuButton.addEventListener('click', function () {
            const isOpening = mobileMenu.classList.contains('hidden');

            if (isOpening) {
                navbar.classList.remove(originalShadow);
                navbar.classList.add('shadow-none');
                document.body.style.overflow = 'hidden';
            } else {
                navbar.classList.remove('shadow-none');
                navbar.classList.add(originalShadow);
                document.body.style.overflow = '';
            }

            mobileMenu.classList.toggle('hidden');
        });
    }
});



//-----------Calendar-------//


// Add this script at the end of your file, before </x-layout>

document.addEventListener('DOMContentLoaded', function () {
    const calendarContainer = document.getElementById('calendarContainer');
    const datePickerBtn = document.getElementById('datePickerBtn');
    const selectedDateDisplay = document.getElementById('selectedDateDisplay');
    const calendarDays = document.getElementById('calendarDays');
    const dateText = document.getElementById('date');

    // Only run if calendar elements exist
    if (!calendarContainer || !datePickerBtn || !selectedDateDisplay || !calendarDays || !dateText) {
        return;
    }

    let currentDate = new Date();
    let selectedDate = null;

    // Toggle calendar visibility
    datePickerBtn.addEventListener('click', () => {
        calendarContainer.classList.toggle('hidden');
        if (!calendarContainer.classList.contains('hidden')) {
            generateCalendar(currentDate);
        }
    });

    // Close calendar when clicking outside
    document.addEventListener('click', (e) => {
        if (!calendarContainer.contains(e.target) && !datePickerBtn.contains(e.target)) {
            calendarContainer.classList.add('hidden');
        }
    });

    // Handle date selection
    calendarDays.addEventListener('click', (e) => {
        if (e.target.classList.contains('calendar-day') && !e.target.dataset.disabled) {
            const date = new Date(e.target.dataset.date);
            selectedDate = date;
            selectedDateDisplay.textContent = date.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            calendarContainer.classList.add('hidden');
        }
    });

    // Previous month button
    const prevMonthBtn = document.getElementById('prevMonth');
    if (prevMonthBtn) {
        prevMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            generateCalendar(currentDate);
        });
    }

    // Next month button
    const nextMonthBtn = document.getElementById('nextMonth');
    if (nextMonthBtn) {
        nextMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            generateCalendar(currentDate);
        });
    }

    function generateCalendar(date) {
        const monthYear = document.getElementById('monthYear');
        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        monthYear.textContent = date.toLocaleDateString('en-US', {
            month: 'long',
            year: 'numeric'
        });

        let daysHTML = '';
        // Add empty cells for days before the first day of the month
        for (let i = 0; i < (firstDay.getDay() || 7) - 1; i++) {
            daysHTML += '<div></div>';
        }

        // Add the days of the month
        for (let day = 1; day <= lastDay.getDate(); day++) {
            const currentDay = new Date(date.getFullYear(), date.getMonth(), day);
            const isSelected = selectedDate && currentDay.toDateString() === selectedDate.toDateString();
            const isToday = currentDay.toDateString() === new Date().toDateString();
            const isPast = currentDay < new Date().setHours(0, 0, 0, 0);

            daysHTML += `
                <div 
                    class="calendar-day ${isPast ? 'cursor-not-allowed text-gray-400' : 'cursor-pointer hover:bg-gray-100'} p-2 rounded-full
                    ${isSelected ? 'bg-orange-500 text-white hover:bg-orange-600' : ''}
                    ${isToday ? 'border border-orange-500' : ''}
                    ${isPast ? 'opacity-50' : ''}"
                    data-date="${currentDay.toISOString()}"
                    ${isPast ? 'data-disabled="true"' : ''}
                >
                    ${day}
                </div>
            `;
        }

        calendarDays.innerHTML = daysHTML;

        calendarDays.addEventListener('click', (e) => {
            if (e.target.classList.contains('calendar-day') && !e.target.dataset.disabled) {
                const date = new Date(e.target.dataset.date);
                selectedDate = date;

                // Format date for display (Month DD, YYYY)
                const displayDate = date.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                // Format date for backend (YYYY-MM-DD)
                const backendDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;

                // Update the visible text
                selectedDateDisplay.textContent = displayDate;

                // Add a hidden input field if you don't already have one
                let hiddenDateInput = document.getElementById('hidden-date-input');
                if (!hiddenDateInput) {
                    hiddenDateInput = document.createElement('input');
                    hiddenDateInput.type = 'hidden';
                    hiddenDateInput.id = 'hidden-date-input';
                    hiddenDateInput.name = 'selected_date';
                    datePickerBtn.parentNode.appendChild(hiddenDateInput);

                }
                hiddenDateInput.value = backendDate;
                dateText.textContent = "Selected date";
                calendarContainer.classList.add('hidden');
            }
        });

    }
});


//------travellers------//

document.addEventListener('DOMContentLoaded', function () {
    const travelersBtn = document.getElementById('travelersBtn');
    const travelersDropdown = document.getElementById('travelersDropdown');
    const travelersCount = document.getElementById('travelersCount');
    const incrementBtns = document.querySelectorAll('.incrementBtn');
    const decrementBtns = document.querySelectorAll('.decrementBtn');
    const applyTravelersBtn = document.getElementById('applyTravelers');

    // Only run if travelers elements exist
    if (!travelersBtn || !travelersDropdown || !travelersCount || !applyTravelersBtn) {
        return;
    }

    let counts = {
        adults: 2,
        children: 0
    };

    // Initialize counts display
    updateCounts();

    // Toggle travelers dropdown
    travelersBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        travelersDropdown.classList.toggle('hidden');
    });

    // Add Apply button handler
    applyTravelersBtn.addEventListener('click', () => {
        travelersDropdown.classList.add('hidden');
    });
    // Modify click outside handler to exclude the Apply button
    document.addEventListener('click', (e) => {
        if (!travelersDropdown.contains(e.target) &&
            !travelersBtn.contains(e.target) &&
            !applyTravelersBtn.contains(e.target)) {
            travelersDropdown.classList.add('hidden');
        }
    });

    // Increment and decrement buttons
    incrementBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const type = btn.dataset.type;
            const total = counts.adults + counts.children;

            // Check if we can add more people (max 15 total)
            if (total < 15) {
                if (type === 'adults' && counts[type] < 15) {
                    counts[type]++;
                } else if (type === 'children' && counts[type] < 15) {
                    counts[type]++;
                }
            }
            updateCounts();
        });
    });

    decrementBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const type = btn.dataset.type;
            if (type === 'adults' && counts[type] > 1) {
                counts[type]--;
            } else if (type === 'children' && counts[type] > 0) {
                counts[type]--;
            }
            updateCounts();
        });
    });

    function updateCounts() {
        const adultsCountEl = document.getElementById('adultsCount');
        const childrenCountEl = document.getElementById('childrenCount');

        if (adultsCountEl) adultsCountEl.textContent = counts.adults;
        if (childrenCountEl) childrenCountEl.textContent = counts.children;

        const total = counts.adults + counts.children;
        if (travelersCount) {
            if (total === 1) {
                travelersCount.textContent = '1 Adult';
            } else {
                const adultsText = counts.adults > 0 ? `${counts.adults} Adult${counts.adults > 1 ? 's' : ''}` : '';
                const childrenText = counts.children > 0 ? `${counts.children} Child${counts.children > 1 ? 'ren' : ''}` : '';

                if (counts.adults > 0 && counts.children > 0) {
                    travelersCount.textContent = `${adultsText}, ${childrenText}`;
                } else {
                    travelersCount.textContent = adultsText || childrenText;
                }
            }
        }

        // Disable increment buttons when at maximum (15 total)
        incrementBtns.forEach(btn => {
            if (total >= 15) {
                btn.disabled = true;
                btn.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                btn.disabled = false;
                btn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        });
    }
});

//--------LoginMessage--------//

// Handle success message
const successAlert = document.getElementById('successAlert');
if (successAlert) {
    setTimeout(() => {
        successAlert.style.transition = 'opacity 0.5s';
        successAlert.style.opacity = '0';
        setTimeout(() => {
            successAlert.remove();
        }, 500);
    }, 3000);
}

// Handle error message
const errorAlert = document.getElementById('errorAlert');
if (errorAlert) {
    setTimeout(() => {
        errorAlert.style.transition = 'opacity 0.5s';
        errorAlert.style.opacity = '0';
        setTimeout(() => {
            errorAlert.remove();
        }, 500);
    }, 3000);
}


document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');
    const signUpForm = document.getElementById('sign-up-form');
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const loginError = document.querySelector('.login-error');

    // Only run if login/signup elements exist
    if (!loginForm || !signUpForm || !signUpButton || !signInButton) {
        return;
    }

    function clearFormErrors(form) {
        // Clear all error messages
        const errorMessages = form.querySelectorAll('.text-red-500, .login-error');
        errorMessages.forEach(error => error.remove());

        // Remove red border from inputs
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.classList.remove('border-red-500');
            input.value = ''; // Clear input values
        });

        // Remove any session error messages
        const sessionErrors = document.querySelectorAll('[data-error-type="login"]');
        sessionErrors.forEach(error => error.remove());
    }

    signUpButton.addEventListener('click', function (e) {
        e.preventDefault();
        clearFormErrors(loginForm);
        loginForm.classList.add('hidden');
        signUpForm.classList.remove('hidden');
        signUpForm.querySelector('input[name="first_name"]').focus();

        // Remove URL parameters
        history.replaceState({}, '', window.location.pathname);
    });

    signInButton.addEventListener('click', function (e) {
        e.preventDefault();
        clearFormErrors(signUpForm);
        signUpForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        loginForm.querySelector('input[name="email"]').focus();

        // Remove URL parameters
        history.replaceState({}, '', window.location.pathname);
    });
});

//--------Search Button Handler--------//

document.addEventListener('DOMContentLoaded', function () {
    const searchBtn = document.getElementById('searchBtn');

    if (searchBtn) {
        searchBtn.addEventListener('click', function () {
            // Get selected date
            const hiddenDateInput = document.getElementById('hidden-date-input');
            const selectedDate = hiddenDateInput ? hiddenDateInput.value : null;

            // Get participant count
            const adultsCount = document.getElementById('adultsCount');
            const childrenCount = document.getElementById('childrenCount');
            const adults = adultsCount ? parseInt(adultsCount.textContent) : 2;
            const children = childrenCount ? parseInt(childrenCount.textContent) : 0;
            const totalParticipants = adults + children;

            // Show message if no date is selected
            if (!selectedDate) {
                // Create a temporary message
                const messageDiv = document.createElement('div');
                messageDiv.className = 'fixed top-[120px] left-1/2 transform -translate-x-1/2 bg-orange-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm';
                messageDiv.textContent = 'Please select a date to search for available activities';
                document.body.appendChild(messageDiv);

                // Remove message after 3 seconds
                setTimeout(() => {
                    document.body.removeChild(messageDiv);
                }, 3000);

                return;
            }

            // Build the search URL
            let searchUrl = '/activities';
            const params = new URLSearchParams();

            params.append('date', selectedDate);
            params.append('participants', totalParticipants);

            searchUrl += '?' + params.toString();

            // Navigate to activities page with search parameters
            window.location.href = searchUrl;
        });
    }
});
