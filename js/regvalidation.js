// Add Event listener for DOMContentLoaded event to the entire HTML document to start validation
document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners to input fields for real-time validation
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("userid").addEventListener("input", validateLogin);
    document.getElementById("userpw").addEventListener("input", validatePassword);
    document.getElementById("retypepw").addEventListener("input", validatePasswordMatch);
    document.getElementById("signupForm").addEventListener("submit", function(event) {
        if (!validate()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});

// Function to validate the entire form
function validate() {
    let isValid = true;

    // Validate each field
    if (!validateEmail()) isValid = false;
    if (!validateLogin()) isValid = false;
    if (!validatePassword()) isValid = false;
    if (!validatePasswordMatch()) isValid = false;

    if (isValid) {
        // Convert login user name to lowercase before submission
        document.getElementById("userid").value = document.getElementById("userid").value.toLowerCase();
    }
    return isValid;
}

// Function to validate email
function validateEmail() {
    let email = document.getElementById("email").value;
    const emailregex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailregex.test(email) || email.trim() === '') {
        document.getElementById('emailError').innerText = "x Email address should be non-empty with the format xyz@xyz.xyz.";
        return false;
    } else {
        clearError('emailError');
        return true;
    }
}

// Function to validate login user name
function validateLogin() {
    let login = document.getElementById("userid").value;
    if (login.trim() === "" || login.length >= 30) {
        document.getElementById('useridError').innerText = "x User name should be non-empty, and less than 30 characters long.";
        return false;
    } else {
        clearError('useridError');
        return true;
    }
}

// Function to validate password
function validatePassword() {
    let pass = document.getElementById("userpw").value;
    if (pass.trim() === "" || pass.length < 8) {
        document.getElementById('userpwError').innerText = "x Password should be at least 8 characters long.";
        return false;
    } else {
        clearError('userpwError');
        return true;
    }
}

// Function to validate re-typed password
function validatePasswordMatch() {
    let pass = document.getElementById("userpw").value;
    let pass2 = document.getElementById("retypepw").value;
    if (pass !== pass2 || pass2.trim() === "") {
        document.getElementById('retypepwError').innerText = "x Please retype password.";
        return false;
    } else {
        clearError('retypepwError');
        return true;
    }
}

// Function to clear error messages
function clearError(elementId) {
    document.getElementById(elementId).innerText = '';
}
