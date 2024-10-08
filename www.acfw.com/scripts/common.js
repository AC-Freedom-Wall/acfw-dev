/*
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See
	date: 2024-08-01
	file name: common.js
	description: This file contains the common JavaScript functions used in the website.
 */

$(document).ready(function(){
	// When the user clicks on the button, load more 5 posts
	var offset = 5; // Initial offset for the next set of posts

	$("#loadMore").click(function(){
	  $.ajax({
		url: '/www.acfw.com/server/board/load_more.php',
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
    // $("#rep_bt").click(function(){
    //     $.post("/www.acfw.com/server/board/reply_ok.php",{
    //         bno:$("#bno").val(),
    //         dat_user:$("#dat_user").val(),
    //         dat_pw:$("#dat_pw").val(),
    //         content:$("#re_content").val()
    //     },
    //     function(data,success){
    //         alert(success);
    //         if(success === "success"){
    //             $(".reply_view").html(data);
    //             // document.getElementById("form_comment").reset();
    //             // history.go(0);
    //             // alert("A comment has been made");
    //         }else{
    //             // alert("Comment failed");
    //         }
    //     });
    // });

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
    document.getElementById("namecs").addEventListener("input", validateContactName);
    document.getElementById("emailcs").addEventListener("input", validateContactEmail);
    document.getElementById("message").addEventListener("input", validateContactMessage);
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

    if (!validateContactName()) isValid = false;
    if (!validateContactEmail()) isValid = false;
    if (!validateContactMessage()) isValid = false;

    return isValid;
}

// Function to validate name
function validateContactName() {
    const name = document.getElementById("namecs").value.trim();
    const nameError = document.getElementById("nameError");
    if (name === '') {
        nameError.innerText = 'Name is required.';
        nameError.style.display = 'block';
        return false;
    } else {
        clearContactError('nameError');
        return true;
    }
}

// Function to validate email
function validateContactEmail() {
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
        clearContactError('emailError');
        return true;
    }
}

// Function to validate message
function validateContactMessage() {
    const message = document.getElementById("message").value.trim();
    const messageError = document.getElementById("messageError");
    if (message === '') {
        messageError.innerText = 'Message is required.';
        messageError.style.display = 'block';
        return false;
    } else {
        clearContactError('messageError');
        return true;
    }
}

// Function to clear error messages
function clearContactError(elementId) {
    document.getElementById(elementId).innerText = '';
    document.getElementById(elementId).style.display = 'none';
}

// JoinForm.js

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

function validateSearch() {
    var searchInput = document.querySelector('input[name="search"]').value.trim();
    if (searchInput === "") {
        alert("Please enter a search term.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

// common.js

function validateWritePost() {
    // Clear previous error messages
    document.getElementById('titleError').textContent = "";
    document.getElementById('nameError').textContent = "";
    document.getElementById('contentError').textContent = "";
    document.getElementById('passwordError').textContent = "";

    // Get the values of the form fields
    var title = document.getElementById('utitle').value.trim();
    var name = document.getElementById('uname').value.trim();
    var content = document.getElementById('ucontent').value.trim();
    var password = document.getElementById('upw').value.trim();

    var isValid = true;

    // Check if the title is empty
    if (title === "") {
        document.getElementById('titleError').textContent = "Please enter a title.";
        isValid = false;
    }

    // Check if the name is empty
    if (name === "") {
        document.getElementById('nameError').textContent = "Please enter your pseudonym.";
        isValid = false;
    }

    // Check if the content is empty
    if (content === "") {
        document.getElementById('contentError').textContent = "Please enter the content.";
        isValid = false;
    }

    // Check if the password is empty
    if (password === "") {
        document.getElementById('passwordError').textContent = "Please enter a password.";
        isValid = false;
    }

    // If all checks pass, allow form submission
    return isValid;
}

// common.js

function validateWriteComment() {
    // Clear previous error messages
    document.getElementById('comment_contentError').textContent = "";
    document.getElementById('comment_userError').textContent = "";
    document.getElementById('comment_passwordError').textContent = "";

    // Get the values of the form fields
    var content = document.getElementById('re_content').value.trim();
    var user = document.getElementById('dat_user').value.trim();
    var password = document.getElementById('dat_pw').value.trim();

    var isValid = true;

    // Check if the content is empty
    if (content === "") {
        document.getElementById('comment_contentError').textContent = "Please enter your comment.";
        isValid = false;
    }

    // Check if the user pseudonym is empty
    if (user === "") {
        document.getElementById('comment_userError').textContent = "Please enter your pseudonym.";
        isValid = false;
    }

    // Check if the password is empty
    if (password === "") {
        document.getElementById('comment_passwordError').textContent = "Please enter a password.";
        isValid = false;
    }

    // If all checks pass, allow form submission
    return isValid;
}