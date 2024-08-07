<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: logout.php
	description: This file is used to logout the user from the website.
-->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";

	session_destroy();
?>
<meta charset="utf-8">
<script>alert("Bye <?php echo $_SESSION['userid']; ?> 🙃.\nSee you soon. 😉"); location.href="/www.acfw.com/index.php"; </script>