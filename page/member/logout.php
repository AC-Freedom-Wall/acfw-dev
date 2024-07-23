<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";
	session_destroy();
?>
<meta charset="utf-8">
<script>alert("You are logged out."); location.href="/index.php"; </script>