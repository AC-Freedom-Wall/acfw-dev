<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

$bno = $_GET['idx'];
$username = addslashes($_POST['name']);
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = addslashes($_POST['title']);
$content = addslashes($_POST['content']);

$sql = query("update board set name='".$username."',pw='".$userpw."',title='".$title.")',content='".$content."' where idx='".$bno."'");
?>

<meta http-equiv="refresh" content="0 url=/"/>
