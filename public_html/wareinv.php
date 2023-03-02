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
<form action = "wareinvinfo.inc.php" method="POST">
	<label>id number of warehouse must match existing store</label>
	<br>
    <input type = "text" name="num" placeholder ="warehouse number">
    <br>
	<label>candy name must match existing candy</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
	<label>enter number for total >= 0</label>
	<br>
    <input type = "text" name="total" placeholder ="all current supply">
    <br>
	<label>enter number for shipping >= 0</label>
	<br>
    <input type = "text" name="shipping" placeholder ="total supply ready for shipping">
    <br>
	<label>enter number for shipping to stores >= 0</label>
	<br>
    <input type = "text" name="stores" placeholder ="supply ready to be sent to stores">
    <br>
	<label>enter number for shipping to customers >= 0</label>
	<br>
    <input type = "text" name="cust" placeholder ="supply ready for shipping to customers">
    <br>
	<label>enter number for handling >= 0</label>
	<br>
    <input type = "text" name="handling" placeholder ="Supply being handled">
    <br>
    <button type="submit" name="submit" class="button">Add candy to warehouse</button>    
</form>
</div>

<div class="forms">
	<form action = "wareinvdelinfo.inc.php" method="POST">
	<label>id number of warehouse to delete</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
	<label>name of candy to delete</label>
	<br>
	<input type = "text" name="name" placeholder ="candy name">
    <button type="submit" name="submit" class="button">delete candy from warehouse</button>    
</form>
</div>

<div class="forms">
<form action = "wareinvupdate.inc.php" method="POST">
	<label>id number of warehouse must match existing store</label>
	<br>
    <input type = "text" name="num" placeholder ="warehouse number">
    <br>
	<label>candy name must match existing candy</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
	<label>enter {1: total; 2: total shipping; 3: shipping to stores; 4: shipping to customers; 5: handling}</label>
	<br>
    <input type = "text" name="att" placeholder ="Enter atribute number from above list">
    <br>
	<label>enter number >= 0</label>
	<br>
    <input type = "text" name="val" placeholder ="Enter new value for attribute">
    <br>
    <button type="submit" name="submit" class="button">update candy in warehouse</button>    
</form>
</div>

<div class="tables">
<?php
    $sql = "SELECT * FROM warehouse_inventory;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = (mysqli_num_rows($result));
    if($resultCheck >  0) {
    echo "<table>";
    echo "<tr><th>ware_number</th><th>candy_name</th><th>total</th><th>for_shipping</th><th>ship_stores</th><th>ship_cust</th><th>handling</th></tr>";
        while($row= mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["ware_number"]."</td><td>".$row["candy_name"]."</td><td>".$row["total"]."</td><td>".$row["for_shipping"]."</td><td>".$row["ship_stores"]."</td><td>".$row["ship_cust"]."</td><td>".$row["handling"]."</td>";
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