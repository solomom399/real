<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/index.css" />
	
    <title>CSGA</title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="">
    <img src="../img/cs1.png">
</div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="view.php" class="a">View verified Details</a></li>
                <li><a href="#meet-our-people" class="b">View verified address</a></li>
              </ul>
            </div>
          </div>
        </nav>


<div class="containerr">
<?php
include ('../config/config.php');
$link = $GLOBALS['config'];
$sql = "SELECT * FROM agent";
$result = mysqli_query($link,$sql);
echo '<table class="table table-striped">
        <thead>
              <tr>
                <th>Name of store / Agent</th>
                <th>Photo of store</th>
                <th>Store owners name</th>
                <th>Store owners phone number</th>
                <th>Store owners email address</th>
                <th>Name of contact Person</th>
                <th>Phone number of contact Person</th>
                <th>Email address of contact Person</th>
                <th>IDs</th>
                <th>Address of agents store</th>
                <th>Landmark / Bustop</th>
                <th>Date / time</th>
                <th>Signature</th>
                <th>Verify</th>
              </tr>
            </thead>
            <tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>'.$row['nameofagent'].'</td>
            <td><img style="width: 80px; height: 80px;" src="../store_picture/'.$row['storep'].'"></td>
            <td>'.$row['storeownername'].'</td>
            <td>'.$row['storeownerphone'].'</td>
            <td>'.$row['storeowneremail'].'</td>
            <td>'.$row['nameofcontactperson'].'</td>
            <td>'.$row['phoneofcontactperson'].'</td>
            <td>'.$row['emailofcontactperson'].'</td>
            <td><img style="width: 80px; height: 80px;" src="../ids/'.$row['ids'].'"></td>
            <td>'.$row['addressofagentsstore'].'</td>
            <td>'.$row['landmarkbustop'].'</td>
            <td>'.$row['datet'].'</td>
            <td>'.$row['signature'].'</td>
            <td><form method="POST" class="vform"><input type="hidden" value="'.$row['emailofcontactperson'].'" name="emailofcontactperson" id="emailofcontactperson"><input type="hidden" value="'.$row['storeowneremail'].'" name="storeowneremail" id="storeowneremail"><button type="submit" class="btn btn-success" name="veri">Verify</button></form></td>
        </tr>';
    
}
echo '</tbody></table>';



?>
</div>
<p data-toggle="modal" data-target="#my_Modal" class="run"></p><div class="modal fade " id="my_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <p class="su"></p>
          <img class="suimg" src="../img/loading.gif">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="../js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
 <script type="text/javascript">
 	
 </script>
</body>
</html>