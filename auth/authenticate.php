<?php
	include_once('../config/config.php');
	
	$user = $_POST['userName'];
	$user = htmlspecialchars($user);
	$user = mysqli_real_escape_string($mysqli, $user);
	$pass = $_POST['passWord'];
	$pass = htmlspecialchars($pass);
	$pass = mysqli_real_escape_string($mysqli, $pass);
	
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");
	
	$count = mysqli_num_rows($result);
	
	if($count==1){
		session_start();
		while($res = mysqli_fetch_array($result)){
			$_SESSION['name'] = $res['name'];
			$_SESSION['username'] = $res['username'];
		}
		header("location:../home.php");
	}
	else{
		header("location:../auth/login.php");
	}
?>