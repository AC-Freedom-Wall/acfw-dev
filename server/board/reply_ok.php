<?php
	include "../db.php";

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
    
    if($bno && $_POST['dat_user'] && $userpw && $_POST['content']){
        $sql = query("insert into reply(con_num,name,pw,content) values('".$bno."','".addslashes($_POST['dat_user'])."','".addslashes($userpw)."','".addslashes($_POST['content'])."')");
        $sql2 = query("update levelpoint set point = point + 1 where userid='".$_SESSION['userid']."'");
    }
    else
    {
        echo "<script>alert('Comment failed.');</script>";
    }
    echo "<script>history.back();</script>";
?>