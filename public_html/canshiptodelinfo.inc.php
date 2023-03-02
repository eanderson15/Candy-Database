<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<?php
	$dbserverName = "localhost";
	$dbusername = "eander29";
	$dbpassword= "password";
	$db = "eander29_1";

	$conn = mysqli_connect($dbserverName,$dbusername,$dbpassword,$db);
	if(!$conn){
    		die("Connection failed: " . mysqli_connect_error());
	}
	$wnum = $_POST['wnum'];
	$name = $_POST['name'];
	$snum = $_POST['snum'];
	$sqla = "DELETE FROM can_ship_to WHERE ware_number=$wnum AND candy_name='$name' AND store_number=$snum;";
	if (mysqli_query($conn, $sqla)) {
		echo "Success.";
		header("Location: ./canshipto.php?=can_ship_to_delete_success");
	} else {
		echo "Error: " . $sqla . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="canshipto.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>