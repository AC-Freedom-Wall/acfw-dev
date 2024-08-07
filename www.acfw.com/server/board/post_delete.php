<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: post_delete.php
	description: This file is used to delete a post from the board.
-->

<?php
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
	
	$bno = $_GET['idx'];
	$sql = query("delete from board where idx='$bno';");
?>
<script type="text/javascript">alert("Your post has been deleted. 😭");</script>
<meta http-equiv="refresh" content="0 url=/www.acfw.com/" />