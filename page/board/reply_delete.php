<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";
$rno = $_POST['rno']; 
$sql = query("select * from reply where idx='".$rno."'");//reply table idx is equal to rno
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = query("select * from board where idx='".$bno."'");//board table idx is equal to bno
$board = $sql2->fetch_array();

$pwk = $_POST['pw'];
$bpw = $reply['pw'];

if(password_verify($pwk, $bpw)) 
	{
		$sql = query("delete from reply where idx='".$rno."'"); ?>
	<script type="text/javascript">alert('Your comment has been deleted.'); history.back();</script>
<?php 
	}else{ 
?>
		<script type="text/javascript">alert('Invalid password');history.back();</script>
<?php 
	} 
?>