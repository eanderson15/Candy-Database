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
	$calories = $_POST['calories'];
	$tot_fat = $_POST['tot_fat'];
	$sat_fat = $_POST['sat_fat'];
	$cholesterol = $_POST['cholesterol'];
	$sodium = $_POST['sodium'];
	$tot_carbs = $_POST['tot_carbs'];
	$diet_fiber = $_POST['diet_fiber'];
	$tot_sug = $_POST['tot_sug'];
	$protein = $_POST['protein'];
	$sql = "INSERT INTO nutrition_profile (candy_name, calories, tot_fat, sat_fat, cholesterol, sodium, tot_carbs, diet_fiber, tot_sug, protein) VALUES ('$cname', $calories, $tot_fat, $sat_fat, $cholesterol, $sodium, $tot_carbs, $diet_fiber, $tot_sug, $protein);";
	if (mysqli_query($conn, $sql)) {
		echo "Success.";
		header("Location: ./nutritiontable.php?=nutrition_profile_success");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="nutrition.php" class="button">try again</a>
</div>
</html>