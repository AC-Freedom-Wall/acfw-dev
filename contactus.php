<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<div class="contactus">

<h2>Contact Us</h2>
        <form id="contactForm" action="" method="GET">
            <div class="form-group">
                <label for="name">Pseudonym:</label>
                <input type="text" id="name" name="name">
                <span class="error" id="nameError"></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
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
        <script src="scripts.js"></script>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
