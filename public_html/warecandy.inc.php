<?php
session_start();
?>
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
	$store = $_POST['num'];
	$key = $_POST['key'];
	$amount = $_POST['amount'];
	$sql = "SELECT ware_number, candy_name, total
	FROM warehouse_inventory NATURAL JOIN can_ship_to
	WHERE (candy_name LIKE '$key' 
	AND store_number = '$store' 
	AND '$amount' <= total);";
	if (mysqli_query($conn, $sql)) {
		$_SESSION["csql"] = $sql;
		echo "Success.";
		header("Location: ./warecandyresult.php?=success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="site.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>