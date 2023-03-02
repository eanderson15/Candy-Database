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
	$cname = $_SESSION["cname"];
	$flavor = $_POST['flavor'];
	$sql = "INSERT INTO flavors (candy_name, flavor) VALUES ('$cname', '$flavor');";
	if (mysqli_query($conn, $sql)) {
		echo "Success.";
		header("Location: ./nutrition.php?=flavor_success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
?>
<br>
<br>
<div class="tback">
<a href ="flavor.php" class="button">try again</a>
</div>
</html>
