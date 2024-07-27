<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";
$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}

if ($_FILES['b_file']['error'] === UPLOAD_ERR_OK) {
	$tmpfile = $_FILES['b_file']['tmp_name'];
	$o_name = $_FILES['b_file']['name'];
	//$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
	$filename = $_FILES['b_file']['name'];
	$folder = $_SERVER['DOCUMENT_ROOT']."/upload/".$filename;
	if (file_exists($tmpfile)) {
		move_uploaded_file($tmpfile, $folder);
	} else {
		echo "Error: Uploaded file does not exist.";
	}
} else {
	echo "Error: File upload failed.";
}

$mqq = query("alter table board auto_increment =1"); //auto_increment 값 초기화
$sql= query("insert into board(name,pw,title,content,date,lock_post,file) values('".addslashes($_POST['name'])."','".addslashes($userpw)."','".addslashes($_POST['title'])."','".addslashes($_POST['content'])."','".$date."','".$lo_post."','".$o_name."')");
echo "<script>alert('Writing is complete.');</script>";
?>
<meta http-equiv="refresh" content="0 url=/"/>