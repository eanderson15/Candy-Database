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
	$att = $_POST['att'];
	$val = $_POST['val'];
	$attint = intval($att);
	if($attint == 1){
		$att = "total";
	}
	else if($attint == 2){
		$att = "for_shipping";
	}
	else if($attint == 3){
		$att = "ship_stores";
	}
	else if($attint == 4){
		$att = "ship_cust";
	}
	else if($attint == 5){
		$att = "handling";
	}




	
	

	
	$sql = "UPDATE warehouse_inventory
			SET $att = '$val'
			WHERE ware_number = $num AND candy_name='$name';";
	if (mysqli_query($conn, $sql)) {
		echo "Success.";
		header("Location: ./wareinv.php?=success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="wareinv.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>