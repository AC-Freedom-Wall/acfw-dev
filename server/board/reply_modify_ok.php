<?php
include "../../db.php";

$rno = $_POST['rno'];//댓글번호
$sql = query("select * from reply where idx='".$rno."'"); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['b_no']; //게시글 번호
$sql2 = query("select * from board where idx='".$bno."'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$sql3 = query("update reply set content='".addslashes($_POST['content'])."' where idx = '".$rno."'");//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
?>
<script type="text/javascript">history.back();</script>";
