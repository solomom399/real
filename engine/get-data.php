<?php
include ('../config/config.php');
$link = $GLOBALS['config'];
$storeps = $_FILES['storep'];
   $ids = $_FILES['ids'];

   $target_dir = "../store_picture/";
    $target_file = $target_dir . basename(@$storeps["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $str = "abcdefghijklmnopqrstuvwsyz1234567890";
    $uni = str_shuffle($str);
    $er = substr($uni,0,5);
    $real = substr(@$storeps["name"],0,strpos(@$storeps["name"],'.'));
    $tr = substr($real,0,0);
    $new = $er.$tr.'.'.$imageFileType;


    $target_dirs = "../ids/";
    $target_file = $target_dirs . basename(@$ids["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $str = "abcdefghstuvwsyz1234567890ijklmnopqr";
    $uni = str_shuffle($str);
    $er = substr($uni,0,5);
    $real = substr(@$ids["name"],0,strpos(@$ids["name"],'.'));
    $tr = substr($real,0,0);
    $idss = $er.$tr.'.'.$imageFileType;

$nameofagent = mysqli_real_escape_string($link,$_POST['nameofagent']);
$storeownername = mysqli_real_escape_string($link,$_POST['storeownername']);
$storeownerphone = mysqli_real_escape_string($link,$_POST['storeownerphone']);
$storeowneremail = mysqli_real_escape_string($link,$_POST['storeowneremail']);
$nameofcontactperson = mysqli_real_escape_string($link,$_POST['nameofcontactperson']);
$phoneofcontactperson = mysqli_real_escape_string($link,$_POST['phoneofcontactperson']);
$emailofcontactperson = mysqli_real_escape_string($link,$_POST['emailofcontactperson']);
$addressofagentsstore = mysqli_real_escape_string($link,$_POST['addressofagentsstore']);
$landmarkbustop = mysqli_real_escape_string($link,$_POST['landmarkbustop']);
$signature = mysqli_real_escape_string($link,$_POST['signature']);
$sql = "INSERT INTO agent (nameofagent, storep, storeownername, storeownerphone, storeowneremail, nameofcontactperson, phoneofcontactperson, emailofcontactperson, addressofagentsstore, landmarkbustop, datet, signature, ids) VALUES ('$nameofagent', '$new', '$storeownername', '$storeownerphone', '$storeowneremail', '$nameofcontactperson', '$phoneofcontactperson', '$emailofcontactperson', '$addressofagentsstore', '$landmarkbustop', now(), '$signature', '$idss')";
if(mysqli_query($link,$sql)){
	move_uploaded_file($storeps["tmp_name"], $target_dir.$new);
        move_uploaded_file($ids["tmp_name"], $target_dirs.$idss);
	echo "Successful";
}else{
	echo "Registration error";
}


?>