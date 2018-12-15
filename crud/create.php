<?php
//including the database connection file
include_once("../config/config.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
	$name = htmlspecialchars($name);
	$name = mysqli_real_escape_string($mysqli, $name);
    $nickname = $_POST['nickname'];
	$nickname = htmlspecialchars($nickname);
	$nickname = mysqli_real_escape_string($mysqli, $nickname);
	$birthdate = date("Y-m-d", strtotime($_POST['birthdate']));
    $address = $_POST['address'];
	$address = htmlspecialchars($address);
	$address = mysqli_real_escape_string($mysqli, $address);
    $gryrlvl = $_POST['gryrlvl'];
	$gryrlvl = htmlspecialchars($gryrlvl);
	$gryrlvl = mysqli_real_escape_string($mysqli, $gryrlvl);
        
	
	//insert data to database    
	$result = mysqli_query($mysqli, "INSERT INTO clients(name, nickname, birthdate, address, gryrlvl) VALUES('$name','$nickname','$birthdate', '$address', '$gryrlvl')");
        
    header("location:../pages/index.php");
}
?>