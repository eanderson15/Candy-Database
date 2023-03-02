<?php
session_start();
?>
<?php
$dbserverName = "localhost";
$dbusername = "eander29";
$dbpassword= "password";
$db = "eander29_1";

$conn = mysqli_connect($dbserverName,$dbusername,$dbpassword,$db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
	$sql = $_SESSION["csql"];
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
		echo "<table>";
		echo "<tr><th>candy_name</th><th>sweet</th><th>bitter</th><th>k_approved</th><th>type</th><th>salty</th><th>chocolate</th><th>crunchy</th><th>chewy</th><th>sour</th></tr>";
        	while($row= mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["candy_name"]."</td><td>".$row["sweet"]."</td><td>".$row["bitter"]."</td><td>".$row["k_approved"]."</td><td>".$row["type"]."</td><td>".$row["salty"]."</td><td>".$row["chocolate"]."</td><td>".$row["crunchy"]."</td><td>".$row["chewy"]."</td><td>".$row["sour"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<a href = "candy.php" class="button">search another candy</a>
<br>
<a href ="site.php" class="button">go home</a>
<br>
