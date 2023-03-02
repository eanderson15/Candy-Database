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
	$name = $_POST['name'];
	$sweet = $_POST['sweet'];
	$bitter = $_POST['bitter'];
	$kind = $_POST['kind'];
	$type = $_POST['type'];
	$salty = $_POST['salty'];
	$chocolate = $_POST['chocolate'];
	$crunchy = $_POST['crunchy'];
	$chewy = $_POST['chewy'];
	$sour = $_POST['sour'];
	$_SESSION["cname"] = $name;
	$sqla = "INSERT INTO candy_profile (candy_name, sweet, bitter, k_approved, type, salty, chocolate, crunchy, chewy, sour) VALUES ('$name', $sweet, $bitter,'$kind', '$type', $salty, $chocolate, $crunchy, $chewy, $sour);";
	if (mysqli_query($conn, $sqla)) {
		echo "Success.";
		header("Location: ./flavor.php?=candy_profile_success");
	} else {
		echo "Error: " . $sqla . "<br>" . mysqli_error($conn);
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
