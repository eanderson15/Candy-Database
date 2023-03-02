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
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	$income = $_POST['income'];
	$exp = $_POST['exp'];
	$payroll = $_POST['payroll'];
	$profit = $_POST['profit'];
	$sqla = "INSERT INTO store (store_number, name, street, city, state,zip, country, income, expenditures, payroll, profit) VALUES ($num, '$name', '$street','$city', '$state', '$zip', '$country', $income, $exp, $payroll,$profit);";
	if (mysqli_query($conn, $sqla)) {
		echo "Success.";
		header("Location: ./storeadd.php?=store_success");
	} else {
		echo "Error: " . $sqla . "<br>" . mysqli_error($conn);
	}
?>
<br>
<br>
<div class="tback">
<a href ="storeadd.php" class="button">try again</a>
</div>
<div class="tback">
<a href ="site.php" class="button">go home</a>
</div>
</html>
