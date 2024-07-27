document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners
    document.getElementById("name").addEventListener("input", validateName);
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("message").addEventListener("input", validateMessage);
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();
        if (validateForm()) {
            const formData = new URLSearchParams(new FormData(this)).toString();
            window.location.href = 'confirmation.php?' + formData;
        } else {
            const confirmation = document.getElementById('confirmation');
            confirmation.className = 'confirmation error';
            confirmation.innerText = 'Please fix the errors above.';
            confirmation.style.display = 'block';
        }
    });
});

// Form validation function
function validateForm() {
    let isValid = true;

    if (!validateName()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validateMessage()) isValid = false;

    return isValid;
}

// Function to validate name
function validateName() {
    const name = document.getElementById("name").value.trim();
    const nameError = document.getElementById("nameError");
    if (name === '') {
        nameError.innerText = 'Name is required.';
        nameError.style.display = 'block';
        return false;
    } else {
        clearError('nameError');
        return true;
    }
}

// Function to validate email
function validateEmail() {
    const email = document.getElementById("email").value.trim();
    const emailError = document.getElementById("emailError");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        emailError.innerText = 'Email is required.';
        emailError.style.display = 'block';
        return false;
    } else if (!emailPattern.test(email)) {
        emailError.innerText = 'Please enter a valid email address.';
        emailError.style.display = 'block';
        return false;
    } else {
        clearError('emailError');
        return true;
    }
}

// Function to validate message
function validateMessage() {
    const message = document.getElementById("message").value.trim();
    const messageError = document.getElementById("messageError");
    if (message === '') {
        messageError.innerText = 'Message is required.';
        messageError.style.display = 'block';
        return false;
    } else {
        clearError('messageError');
        return true;
    }
}

// Function to clear error messages
function clearError(elementId) {
    document.getElementById(elementId).innerText = '';
    document.getElementById(elementId).style.display = 'none';
}
