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
<form action = "storeinvinfo.inc.php" method="POST">
	<label>id number of store must match existing store</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
	<label>candy name must match existing candy</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
	<label>enter number for incoming >= 0</label>
	<br>
    <input type = "text" name="inc" placeholder ="incoming supply">
    <br>
	<label>enter number for supply >= to 0</label>
	<br>
    <input type = "text" name="curr" placeholder ="current supply">
    <br>
    <button type="submit" name="submit" class="button">Add candy to store</button>    
</form>
</div>

<div class="forms">
	<form action = "storeinvdelinfo.inc.php" method="POST">
	<label>id number of store to delete</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
	<label>name of candy to delete</label>
	<br>
	<input type = "text" name="name" placeholder ="candy name">
    <button type="submit" name="submit" class="button"> delete candy from store</button>    
</form>
</div>

<div class="forms">
	<form action = "storeinvupdate.inc.php" method="POST">
	<label>id number of store to update</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
	<label>name of candy at store to update</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
	<label>enter {1: incoming; 2: supply}</label>
	<br>
    <input type = "text" name="att" placeholder ="Enter atribute number from above list">
    <br>	
	<label>enter number >= 0</label>
	<br>
    <input type = "text" name="val" placeholder ="Enter new value for attribute">
    <br>
    <button type="submit" name="submit" class="button">update candy inventory at store</button>    
</form>
</div>

<div class="tables">
<?php
	$sql = "SELECT * FROM store_inventory;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
	echo "<table>";
	echo "<tr><th>store_number</th><th>candy_name</th><th>incoming</th><th>supply</th></tr>";
        while($row= mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["store_number"]."</td><td>".$row["candy_name"]."</td><td>".$row["incoming"]."</td><td>".$row["supply"]."</td>";
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