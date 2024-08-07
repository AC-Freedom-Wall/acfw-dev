<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: post_write_ok.php
	description: This file is used to write a post to the board.
-->

<?php
	include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";

	$date = date('Y-m-d');
	$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	if(isset($_POST['lockpost'])){
		$in_lock = '1';
	}else{
		$in_lock = '0';
	}

	if ($_FILES['b_file']['error'] === UPLOAD_ERR_OK) {
		$tmpfile = $_FILES['b_file']['tmp_name'];
		$o_name = $_FILES['b_file']['name'];
		$filename = $_FILES['b_file']['name'];
		$folder = "../../upload/".$filename;
		if (file_exists($tmpfile)) {
			move_uploaded_file($tmpfile, $folder);
			$sql2 = query("update levelpoint set point = point + 5 where userid='".$_SESSION['userid']."'");
		} else {
			echo "Error: Uploaded file does not exist.";
		}
	} else {
	//	echo "Error: File upload failed.";
	}

	$mqq = query("alter table board auto_increment =1"); //auto_increment initialize
	$sql= query("insert into board(name,pw,title,content,date,lock_post,file) values('".addslashes($_POST['name'])."','".addslashes($userpw)."','".addslashes($_POST['title'])."','".addslashes($_POST['content'])."','".$date."','".$in_lock."','".$o_name."')");
	$sql2 = query("update levelpoint set point = point + 5 where userid='".$_SESSION['userid']."'");
	?>
<meta http-equiv="refresh" content="0 url=/www.acfw.com/"/>