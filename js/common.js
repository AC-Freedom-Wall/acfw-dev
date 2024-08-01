$(document).ready(function(){
	// When the user clicks on the button, load more 5 posts
	var offset = 5; // Initial offset for the next set of posts

	$("#loadMore").click(function(){
	  $.ajax({
		url: '/page/board/load_more.php',
		type: 'post',
		data: {offset: offset},
		success: function(response){
		  // Append the new posts to the existing ones
		  $("#posts").append(response);
		  // Update the offset
		  offset += 5;
		}
	  });
	});

	// When the user clicks on the button, comment on the post
	$("#rep_bt").click(function(){
		$.post("reply_ok.php",{
			bno:$(".bno").val(),
			dat_user:$(".dat_user").val(),
			dat_pw:$(".dat_pw").val(),
			content:$(".reply_content").val(),
		},	
		function(data,success){
			if(success=="success"){
				$(".reply_view").html(data);
				alert("A comment has been made");	
			}else{
				alert("Comment failed");
			}
		});
	});

	// When the user clicks on the button, edit the comment
	$(".dat_edit_bt").click(function(){
		var obj = $(this).closest(".dap_lo").find(".dat_edit");
		obj.dialog({
			modal:true,
			width:650,
			height:200,
			title: "Edit comments",
			close: function () {
				console.log("dialog_close");
				history.go(0);
			}
		});
		console.log("dialog_open");
	});

	// When the user clicks on the button, delete the comment
	$(".dat_delete_bt").click(function(){
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title: "Confirm comment deletion",
			close: function () {
				console.log("dialog_close");
				history.go(0);
			}
		});
		console.log("dialog_open");
	});

	
});

// contactForm.js

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

    // if (isValid) {
    //     // Clear form fields and provide data in URI
    //     document.getElementById("signupForm").reset();
    //     alert("Form submitted successfully!");
    // }
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