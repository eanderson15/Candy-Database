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
	$sqla = "DELETE FROM store_inventory WHERE store_number=$num AND candy_name='$name'";
	if (mysqli_query($conn, $sqla)) {
		echo "Success.";
		header("Location: ./storeinv.php?=store_inventory_delete_success");
	} else {
		echo "Error: " . $sqla . "<br>" . mysqli_error($conn);
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