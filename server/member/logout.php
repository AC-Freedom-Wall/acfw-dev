<?php
	include "../../db.php";
	session_destroy();
?>
<meta charset="utf-8">
<script>alert("Bye <?php echo $_SESSION['userid']; ?> 🙃.\nSee you soon. 😉"); location.href="../../index.php"; </script>