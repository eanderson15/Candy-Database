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
<form action = "flavorinfo.inc.php" method="POST">
	<label>flavor goes with newly created candy</label>
	<br>
    <input type = "text" name="flavor" placeholder ="flavor">
    <br>
    <button type="submit" name="submit" class="button"> add flavor</button>    
</form>
</div>

<div class="tables">
<?php
	$sql = "SELECT * FROM flavors;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
		echo "<table>";
		echo "<tr><th>candy_name</th><th>flavor</th></tr>";
        	while($row= mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["candy_name"]."</td><td>".$row["flavor"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
</div>

<div class="back">
<a href="nutrition.php" class="button">no flavors to add</a>
</div>
</div>

</body>
</html>