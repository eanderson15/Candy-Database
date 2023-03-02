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
	$att = $_SESSION["catt"];
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
		echo "<table>";
		echo "<tr><th>candy_name</th><th>"."$att"."</th><th>store_number</th><th>supply</th></tr>";
        	while($row= mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["candy_name"]."</td><td>".$row[$att]."</td><td>".$row["store_number"]."</td><td>".$row["supply"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<a href = "site.php" class="button">find other stores</a>
<br>
<a href ="site.php" class="button">go home</a>
<br>