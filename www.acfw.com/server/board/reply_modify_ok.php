<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: reply_modify_ok.php
	description: This file is used to modify a comment from the board.
-->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";

    $rno = $_POST['rno'];//comment number
    $sql = query("select * from reply where idx='".$rno."'"); //reply table idx is equal to rno
    $reply = $sql->fetch_array();

    $bno = $_POST['b_no']; //post number
    $sql2 = query("select * from board where idx='".$bno."'");//board table idx is equal to bno
    $board = $sql2->fetch_array();

    $sql3 = query("update reply set content='".addslashes($_POST['content'])."' where idx = '".$rno."'");//reply table idx is equal to rno
?>
<script type="text/javascript">history.back();</script>";
