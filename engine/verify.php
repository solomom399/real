<?php
include ('../config/config.php');
$link = $GLOBALS['config'];
    $emailofcontactperson = $_POST['emailofcontactperson'];
    $storeowneremail = $_POST['storeowneremail'];
    $sqls = "SELECT * FROM agent WHERE emailofcontactperson ='$emailofcontactperson' AND storeowneremail = '$storeowneremail'";
    if($ress = mysqli_query($link,$sqls)){
        $rows = mysqli_fetch_assoc($ress);
        $nameofagent = $rows['nameofagent'];
        $storep = $rows['storep'];
        $storeownername = $rows['storeownername'];
        $storeownerphone = $rows['storeownerphone'];
        $storeowneremail = $rows['storeowneremail'];
        $nameofcontactperson = $rows['nameofcontactperson'];
        $phoneofcontactperson = $rows['phoneofcontactperson'];
        $emailofcontactperson = $rows['emailofcontactperson'];
        $addressofagentsstore = $rows['addressofagentsstore'];
        $landmarkbustop = $rows['landmarkbustop'];
        $datet = $rows['datet'];
        $signature = $rows['signature'];
        $idss = $rows['ids'];
        $sqli = "INSERT INTO verify (nameofagent, storep, storeownername, storeownerphone, storeowneremail, nameofcontactperson, phoneofcontactperson, emailofcontactperson, addressofagentsstore, landmarkbustop, datet, signature, ids) VALUES ('$nameofagent', '$storep', '$storeownername', '$storeownerphone', '$storeowneremail', '$nameofcontactperson', '$phoneofcontactperson', '$emailofcontactperson', '$addressofagentsstore', '$landmarkbustop', '$datet', '$signature', '$idss')";
        if(mysqli_query($link,$sqli)){
            $sqld = "DELETE FROM agent WHERE emailofcontactperson ='$emailofcontactperson' AND storeowneremail = '$storeowneremail'";
            if(mysqli_query($link,$sqld)){
                echo "Verified";
            }else{
            	echo "Verification Error";
            }
        }

    }
    


    


?>