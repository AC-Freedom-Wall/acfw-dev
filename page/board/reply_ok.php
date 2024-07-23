<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
    
    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = query("insert into reply(con_num,name,pw,content) values('".$bno."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
        echo "<script>alert('A comment has been made.'); 
        location.href='/page/board/read.php?idx=$bno';</script>";
    }else{
        echo "<script>alert('Comment failed.'); 
        history.back();</script>";
    }
	
?>