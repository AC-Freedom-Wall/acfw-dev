<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/head.php";
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/header.php";
?>

<div class="contactus">
    <h2>Contact Us</h2><br>
    <form id="contactForm" action="" method="GET">
        <div class="form-group">
            <label for="namecs">Pseudonym:</label>
            <input type="text" id="namecs" name="namecs" placeholder="Stay anonymous. Just use as pseudonym.">
            <span class="error" id="nameError"></span><br>
        </div>
        <div class="form-group">
            <label for="emailcs">Email:</label>
            <input type="email" id="emailcs" name="emailcs">
            <span class="error" id="emailError"></span><br>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
            <span class="error" id="messageError"></span><br>
        </div>
        <button type="submit">Submit</button>
    </form>
    <div id="confirmation" class="confirmation"></div>
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/footer.php";
?>
