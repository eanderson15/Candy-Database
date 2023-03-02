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
<form action = "store.inc.php" method="POST">
	<label>id number of store must be unique</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
    <input type = "text" name="name" placeholder ="store name">
    <br>
    <input type = "text" name="street" placeholder ="street">
    <br>
    <input type = "text" name="city" placeholder ="city">
    <br>
    <input type = "text" name="state" placeholder ="state">
    <br>
    <input type = "text" name="zip" placeholder ="zip code">
    <br>
    <input type = "text" name="country" placeholder ="country">
    <br>
	<label>enter a number for income >= 0</label>
	<br>
    <input type = "text" name="income" placeholder ="income">
    <br>
	<label>enter a number for expenditures >= 0</label>
	<br>
    <input type = "text" name="exp" placeholder ="expenditures">
    <br>
	<label>enter a number for payroll >= 0</label>
	<br>
    <input type = "text" name="payroll" placeholder ="payroll">
    <br>
	<label>enter a number for profit</label>
	<br>
    <input type = "text" name="profit" placeholder ="profit">
    <br>
    <button type="submit" name="submit" class="button"> make store</button>    
</form>
</div>

<div class="forms">
<form action = "storedelinfo.inc.php" method="POST">
	<label>id number of store to delete</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
    <button type="submit" name="submit" class="button"> delete store</button>    
</form>
</div>

<div class="tables">

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
</div>

<div class="back">
<a href="site.php" class="button">go home</a>
</div>
</div>

</body>
</html>