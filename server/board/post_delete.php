<?php
	include "../db.php";
	
	$bno = $_GET['idx'];
	$sql = query("delete from board where idx='$bno';");
?>
<script type="text/javascript">alert("Your post has been deleted. 😭");</script>
<meta http-equiv="refresh" content="0 url=/" />