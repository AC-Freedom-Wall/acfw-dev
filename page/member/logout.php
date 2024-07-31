<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
	session_destroy();
?>
<meta charset="utf-8">
<script>alert("Bye <?php echo $_SESSION['userid']; ?>. See you soon."); location.href="/index.php"; </script>