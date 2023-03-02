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
	$sql = "SELECT * FROM store;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
	echo "<table>";
	echo "<tr><th>store_number</th><th>name</th><th>street</th><th>city</th><th>state</th><th>zip</th><th>country</th><th>income</th><th>expenditures</th><th>payroll</th><th>profit</th></tr>";
        while($row= mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["store_number"]."</td><td>".$row["name"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["state"]."</td><td>".$row["zip"]."</td><td>".$row["country"]."</td><td>".$row["income"]."</td><td>".$row["expenditures"]."</td><td>".$row["payroll"]."</td><td>".$row["profit"]."</td>";
		echo "</tr>";
	}
}
echo "</table>";

?>


<a href ="storeadd.php" class="button">Add another store</a>
<br>
<a href ="site.php" class="button">Go back</a>
<br>


</body>
</html>