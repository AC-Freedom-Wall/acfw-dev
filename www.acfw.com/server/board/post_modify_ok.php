<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: post_modify_ok.php
	description: This file is used to modify a post from the board.
-->

<?php
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
?>

<?php
    $bno = $_GET['idx'];
    $username = addslashes($_POST['name']);
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = addslashes($_POST['title']);
    $content = addslashes($_POST['content']);

    $sql = query("update board set name='".$username."',pw='".$userpw."',title='".$title.")',content='".$content."' where idx='".$bno."'");
?>

<meta http-equiv="refresh" content="0 url=/www.acfw.com/"/>
