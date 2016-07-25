<?php
//echo '<script>alert("hgfd")</script>';
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
                <th>ID</th>
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
			<td>'.''.'</td>
			<td>'.$row['storeownername'].'</td>
			<td>'.$row['storeownerphone'].'</td>
			<td>'.$row['storeowneremail'].'</td>
			<td>'.$row['nameofcontactperson'].'</td>
			<td>'.$row['phoneofcontactperson'].'</td>
			<td>'.$row['emailofcontactperson'].'</td>
			<td>'.''.'</td>
			<td>'.$row['addressofagentsstore'].'</td>
			<td>'.$row['landmarkbustop'].'</td>
			<td>'.$row['datet'].'</td>
			<td>'.$row['signature'].'</td>
			<td><form method="POST"><input name="df"><button type="submit" class="btn btn-success" name="veri">Verify</button></form></td>
		</tr>';
	
}
echo '</tbody></table>';
if(isset($_POST['veri'])){
	echo $_POST['df'];
}
?>
