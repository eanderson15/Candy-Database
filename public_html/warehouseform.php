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

<div>
<div class="forms">
<form action = "warehouse.inc.php" method="POST">
	<label>identification number of the warehouse and must be unique</label>
	<br>
    <input type = "text" name="num" placeholder ="warehouse number">
    <br>
	<label>address of the warehouse</label>
	<br>
    <input type = "text" name="loc" placeholder ="warehouse location">
    <br>
    <button type="submit" name="submit" class="button"> make warehouse</button>    
</form>
</div>

<div class="forms">
<form action = "waredelinfo.inc.php" method="POST">
	<label>id number of warehouse to delete</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
    <button type="submit" name="submit" class="button"> delete warehouse</button>    
</form>
</div>

<div class="tables">
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
</div>
<div class="back">
<a href ="site.php" class="button">go home</a>
</div>
</div>

</body>
</html>