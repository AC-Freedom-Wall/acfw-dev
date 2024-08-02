<?php	
	include "../../db.php";

	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$password = $_POST['userpw'];
	$sql = query("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 

	if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 note_main.php로 넘어갑니다.
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
		echo "<script>location.href='../../index.php';</script>";

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
	// 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('Confirm your username or password.'); history.back();</script>";
	}
?>