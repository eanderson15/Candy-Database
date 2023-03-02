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
	$att = $_POST['num'];
	$num = $_POST['key'];
	$numint = intval($num);
	$attint = intval($att);
	if($attint == 1){
		$att = "sweet";
	}
	else if($attint == 2){
		$att = "bitter";
	}
	else if($attint == 3){
		$att = "salty";
	}
	else if($attint == 4){
		$att = "chocolate";
	}
	else if($attint == 5){
		$att = "crunchy";
	}
	else if($attint == 6){
		$att = "chewy";
	}
	else if($attint == 7){
		$att = "sour";
	}
	if ($attint > 7 || $attint < 1) {
		echo "Error: " . $sql . "<br>" . "Attribute index out of range 1-7";
	} else if ($numint > 10 || $numint < 1){
		echo "Error: " . $sql . "<br>" . "Attribute rating out of range 1-10";
	} else {
	$sql = "SELECT candy_name,".$att.", store_number, supply
	FROM candy_profile NATURAL JOIN store_inventory
	WHERE (".$att." >= '$num');";
	if (mysqli_query($conn, $sql)) {
		$_SESSION["catt"] = $att;
		$_SESSION["csql"] = $sql;
		echo "Success.";
		header("Location: ./candyfilterresult.php?=success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
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