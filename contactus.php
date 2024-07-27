<?php 
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<div class="contactus">
    <h2>Contact Us</h2>
    <form id="contactForm" action="" method="GET">
        <div class="form-group">
            <label for="namecs">Pseudonym:</label>
            <input type="text" id="namecs" name="namecs" placeholder="Stay anonymous. Just use as pseudonym.">
            <span class="error" id="nameError"></span>
        </div>
        <div class="form-group">
            <label for="emailcs">Email:</label>
            <input type="email" id="emailcs" name="emailcs">
            <span class="error" id="emailError"></span>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
            <span class="error" id="messageError"></span>
        </div>
        <button type="submit">Submit</button>
    </form>
    <div id="confirmation" class="confirmation"></div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners
    document.getElementById("namecs").addEventListener("input", validateName);
    document.getElementById("emailcs").addEventListener("input", validateEmail);
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
    const name = document.getElementById("namecs").value.trim();
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
    const email = document.getElementById("emailcs").value.trim();
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

    </script>
</div>

<?php 
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
