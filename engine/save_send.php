<?php
session_start();
include ('../config/config.php');
$link = $GLOBALS['config'];
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password= md5(mysqli_real_escape_string($link,$_POST['password']));
	
$sql = "SELECT * FROM promoters WHERE username = '$username'";
if ($result = mysqli_query($link,$sql)) {
	while ($row = mysqli_fetch_assoc($result)) {
		if($row['password'] == $password){
			$_SESSION['promoter'] = $row;
			echo true;
		}else{
			echo "Invalid details";
		}
	}
}else{
	echo "Error signing in";
}

}
?>