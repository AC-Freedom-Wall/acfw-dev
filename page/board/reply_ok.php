<?php
	include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
    
    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = query("insert into reply(con_num,name,pw,content) values('".$bno."','".addslashes($_POST['dat_user'])."','".addslashes($userpw)."','".addslashes($_POST['content'])."')");
        echo "<script>alert('A comment has been made.');";
    }
    else
    {
        echo "<script>alert('Comment failed.');";
    }
	//location.href='/page/board/read.php?idx=$bno';</script>";
    echo "history.back();</script>";
?>