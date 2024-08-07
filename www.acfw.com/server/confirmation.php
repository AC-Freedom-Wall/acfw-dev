<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: confirmation.php
	description: This file is used to confirm that the user has sent a message to the website.
-->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/head.php";
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/header.php";
?>

<div class="confirmationpage">
        <br><br><br><h1>We received your message!</h1> <br><br><br><br>
        <br><br><br><p>Thank you for reaching out to us.</p><br><br><br><br><br>
        <br><br><br><br><a href="contactus.php"><button>Send us another message</button></a><br>
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/footer.php";
?>
