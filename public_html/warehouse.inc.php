<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<div style='height:100%'>
<?php
	$dbserverName = "localhost";
	$dbusername = "eander29";
	$dbpassword= "password";
	$db = "eander29_1";

	$conn = mysqli_connect($dbserverName,$dbusername,$dbpassword,$db);
	if(!$conn){
    		die("Connection failed: " . mysqli_connect_error());
	}
	$num = $_POST['num'];
	$loc = $_POST['loc'];
	
	$sqlb = "INSERT INTO warehouse (ware_number,ware_loc) VALUES ($num, '$loc');";
	if (mysqli_query($conn, $sqlb)) {
		echo "Success.";
		header("Location: ./warehouseform.php?=warehouse_success");
	} else {
		echo "Error: " . $sqlb . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="warehouseform.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>
