<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";

if (isset($_SESSION['userid'])) {
    echo "<script>alert('Incorrect approach.'); history.back();</script>";
} else {
?>
    <div id="join_form_in">
        <h2>Sign up</h2>
        <form id="signupForm" action="join_ok.php" method="post">
            <div id="join_f">
                <div class="form-group">
                    <label for="userid">Username</label>
                    <div class="mb"><input type="text" class="inp" id="userid" name="userid" placeholder="Username" /></div>
                    <span class="error" id="useridError"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="mb"><input type="email" class="inp" id="email" name="email" placeholder="Email" /></div>
                    <span class="error" id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="userpw">Password</label>
                    <div class="mb"><input type="password" class="inp" id="userpw" name="userpw" placeholder="Password" /></div>
                    <span class="error" id="userpwError"></span>
                </div>
                <div class="form-group">
                    <label for="retypepw">Retype Password</label>
                    <div class="mb"><input type="password" class="inp" id="retypepw" name="retypepw" placeholder="Retype Password" /></div>
                    <span class="error" id="retypepwError"></span>
                </div>
                <!--<div class="form-group">
                    <label for="name">Name</label>
                    <div class="mb"><input type="text" class="inp" id="name" name="name" placeholder="Please enter a name" /></div>
                    <span class="error" id="nameError"></span>
                </div>-->
                <div class="form_btn">
                    <button type="submit" class="form_bt">Submit</button>
                    <button type="reset" class="form_bt2">Reset</button>
                </div>
            </div> <!-- join_f end -->
        </form>
    </div>
<?php
}
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>

<script>
// Add Event listener for DOMContentLoaded event to the entire HTML document to start validation
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById("signupForm");

    // Add event listeners to input fields for real-time validation
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("userid").addEventListener("input", validateLogin);
    document.getElementById("userpw").addEventListener("input", validatePassword);
    document.getElementById("retypepw").addEventListener("input", validatePasswordMatch);

    // Add event listener for form submission
    form.addEventListener("submit", function(event) {
        if (!validate()) {
            event.preventDefault(); // Prevent form submission if validation fails
        
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
        // Clear form fields and provide data in URI
        // document.getElementById("signupForm").reset();
        // alert("Form submitted successfully!");
    }
    return isValid;
}

// Function to validate email
function validateEmail() {
    let email = document.getElementById("email").value;
    const emailregex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailregex.test(email) || email.trim() === '') {
        showError('emailError', "x Email address should be non-empty with the format xyz@xyz.xyz.");
        highlightField('email');
        return false;
    } else {
        clearError('emailError');
        removeHighlight('email');
        return true;
    }
}

// Function to validate login user name
function validateLogin() {
    let login = document.getElementById("userid").value;
    if (login.trim() === "" || login.length >= 10) {
        showError('useridError', "x User name should be non-empty, and less than 10 characters long.");
        highlightField('userid');
        return false;
    } else {
        clearError('useridError');
        removeHighlight('userid');
        return true;
    }
}

// Function to validate password
function validatePassword() {
    let pass = document.getElementById("userpw").value;
    if (pass.trim() === "" || pass.length < 8) {
        showError('userpwError', "x Password should be at least 8 characters long.");
        highlightField('userpw');
        return false;
    } else {
        clearError('userpwError');
        removeHighlight('userpw');
        return true;
    }
}

// Function to validate re-typed password
function validatePasswordMatch() {
    let pass = document.getElementById("userpw").value;
    let pass2 = document.getElementById("retypepw").value;
    if (pass !== pass2 || pass2.trim() === "") {
        showError('retypepwError', "x Please retype password.");
		//retypepwError.innerText = 'x Please retype password.';
		//retypepwError.style.display = 'block';
        highlightField('retypepw');
        return false;
    } else {
        clearError('retypepwError');
        removeHighlight('retypepw');
        return true;
    }
}

// Function to show error messages and highlight fields
function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerText = message;
    errorElement.style.color = 'red'; // Highlight error messages in red
	errorElement.style.display = 'block';
}

// Function to clear error messages
function clearError(elementId) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerText = '';
}

// Function to highlight fields with errors
function highlightField(fieldId) {
    document.getElementById(fieldId).style.border = '2px solid red';
}

// Function to remove highlight from fields
function removeHighlight(fieldId) {
    document.getElementById(fieldId).style.border = '';
}
</script>
