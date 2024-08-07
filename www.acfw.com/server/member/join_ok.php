<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: join_ok.php
	description: This file is used to add a new member to the database.
-->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
?>

<?php
$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['name'];
$email = $_POST['email'];

$id_check = query("select * from member where id='$userid'");
$id_check = $id_check->fetch_array();
if($id_check >= 1){
	echo "<script>alert('The ID is duplicated.'); history.back();</script>";
}else{
	$sql = query("insert into member (id,pw,name,email) values('".$userid."','".$userpw."','".$username."','".$email."')");
	$sql2 = query("insert into levelpoint (userid,point) values('".$userid."','10')");
?>

<script type="text/javascript">alert('Welcome to the Algonquin College Freedom Wall.\nPlease leave your story.');</script>
<meta http-equiv="refresh" content="0 url=/www.acfw.com/">

<?php
}
?>