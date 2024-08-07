<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: login_ok.php
	description: This file is used to log in to the website.
-->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
?>

<?php
	//store the value received as POST in the password variable and use the sql statement to find the username value received as POST.
	$password = $_POST['userpw'];
	$sql = query("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; //In $hash_pw, store the password for the username column received as a POSt. 

	if(password_verify($password, $hash_pw)) //If the password and hash_pw variables are the same, save the session, display the notification, and move on to main.
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
		echo "<script>location.href='/www.acfw.com/index.php';</script>";

		// If the last login is not today, update the points and login time
		$sql = query("select last_login from levelpoint where id='".$_POST['userid']."'");
		$levelpoint = $sql->fetch_array();
		$last_login = $levelpoint['last_login'];

		if($last_login < date('Y-m-d')){ // If last login is not today, update points and login time
			$query = "UPDATE levelpoint 
					SET point = point + 1, last_login = CURDATE() 
					WHERE userid = '".$_SESSION['userid']."' 
						AND last_login < CURDATE();";
			$result = query($query);
		}else{ // If last login is today, update only login time
			$query = "UPDATE levelpoint 
					SET last_login = CURDATE() 
					WHERE userid = '".$_SESSION['userid']."' 
						AND last_login != CURDATE();";
			$result = query($query);
		}
	}else{ 
		// If the password isn't the same, we'll get a notification and return to the previous page
		echo "<script>alert('Confirm your username or password.'); history.back();</script>";
	}
?>