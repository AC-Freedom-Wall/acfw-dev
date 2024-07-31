<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";
$rno = $_POST['rno']; 
$sql = query("select * from reply where idx='".$rno."'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = query("select * from board where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$pwk = $_POST['pw'];
$bpw = $reply['pw'];

if(password_verify($pwk, $bpw)) 
	{
		$sql = query("delete from reply where idx='".$rno."'"); ?>
	<script type="text/javascript">alert('Your comment has been deleted.'); history.back();</script>
	<?php 
	}else{ ?>
		<script type="text/javascript">alert('Invalid password');history.back();</script>
	<?php } ?>