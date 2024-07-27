<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

$bno = $_GET['idx'];
$username = addslashes($_POST['name']);
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = addslashes($_POST['title']);
$content = addslashes($_POST['content']);

echo $content;
$sql = query("update board set name='".$username."',pw='".$userpw."',title='".$title.")',content='".$content."' where idx='".$bno."'"); ?>

<script type="text/javascript">alert("Fixed."); </script>
<meta http-equiv="refresh" content="0 url=/page/board/read.php?idx=<?php echo $bno; ?>">