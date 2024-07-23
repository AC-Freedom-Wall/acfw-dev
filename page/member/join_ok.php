<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";

$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['name'];

$id_check = query("select * from member where id='$userid'");
	$id_check = $id_check->fetch_array();
	if($id_check >= 1){
		echo "<script>alert('The ID is duplicated.'); history.back();</script>";
	}else{
$sql = query("insert into member (id,pw,name) values('".$userid."','".$userpw."','".$username."')");
$sql2 = query("insert into levelpoint (userid,point) values('".$userid."','0')");
?>
<script type="text/javascript">alert('Your signup is complete.');</script>
<meta http-equiv="refresh" content="0 url=/">
<?php } ?>