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
	$sql = "SELECT * FROM warehouse;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
	echo "<table>";
	echo "<tr><th>ware_number</th><th>ware_loc</th>";
        while($row= mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["ware_number"]."</td><td>".$row["ware_loc"]."</td>";
		echo "</tr>";
	}
    }
	echo "</table>";

?>
<br>
<a href ="warehouseform.php" class="button">Add another warehouse</a>
<br>
<a href ="site.php" class="button">Go back</a>
<br>
</body>
</html>