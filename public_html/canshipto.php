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
<form action = "canshiptoinfo.inc.php" method="POST">
	<label>id number of warehouse must match existing warehouse</label>
	<br>
    <input type = "text" name="ware" placeholder ="warehouse number">
    <br>
	<label>candy name must match existing candy</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
	<label>id number of store must match existing store</label>
	<br>
    <input type = "text" name="store" placeholder ="store number">
    <br>
    <button type="submit" name="submit" class="button">add warehouse can ship to store</button>    
</form>
</div>


<div class="forms">
<form action = "canshiptodelinfo.inc.php" method="POST">
	<label>id number of warehouse to delete</label>
	<br>
    <input type = "text" name="wnum" placeholder ="warehouse number">
    <br>
	<label>name of candy to delete</label>
	<br>
	<input type = "text" name="name" placeholder ="candy name">
	<br>
	<label>id number of store to delete</label>
	<br>
    <input type = "text" name="snum" placeholder ="store number">
    <br>
    <button type="submit" name="submit" class="button"> delete candy from store</button>    
</form>
</div>

<div class="tables">
<?php
	$sql = "SELECT * FROM can_ship_to;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
	echo "<table>";
	echo "<tr><th>ware_number</th><th>candy_name</th><th>store_number</th></tr>";
        while($row= mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["ware_number"]."</td><td>".$row["candy_name"]."</td><td>".$row["store_number"]."</td>";
		echo "</tr>";
	}
    }
	echo "</table>";

?>
</div>
<div class="back">
<a href="site.php" class="button">go home</a>
</div>
</div>

</body>
</html>