<?php
include ('../config/config.php');
$link = $GLOBALS['config'];
if(isset($_POST['adminusername']) && isset($_POST['adminpassword'])){
	$username = mysqli_real_escape_string($link,$_POST['adminusername']);
	$password = md5(mysqli_real_escape_string($link,$_POST['adminpassword']));
	
$sql = "SELECT * FROM admin WHERE username = '$username'";
if ($result = mysqli_query($link,$sql)) {
	while ($row = mysqli_fetch_assoc($result)) {
		if($row['password'] == $password){
			$_SESSION['admin'] = $row;
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