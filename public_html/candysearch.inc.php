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
	$key = $_POST['key'];
	$sql = "SELECT * 
	FROM candy_profile
	WHERE
	(
    candy_name LIKE '$key'
    OR type LIKE '$key'
	);";
	if (mysqli_query($conn, $sql)) {
		$_SESSION["csql"] = $sql;
		echo "Success.";
		header("Location: ./candysearchresult.php?=success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="candy.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>