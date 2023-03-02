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
	$num = $_POST['num'];
	$name = $_POST['name'];
	$inc = $_POST['inc'];
	$curr = $_POST['curr'];
	
	$sql = "INSERT INTO store_inventory (store_number, candy_name, incoming, supply) VALUES ($num, '$name', $inc, $curr);";
	if (mysqli_query($conn, $sql)) {
		echo "Success.";
		header("Location: ./storeinv.php?=success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="storeinv.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>