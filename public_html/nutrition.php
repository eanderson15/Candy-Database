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
<form action = "nutritioninfo.inc.php" method="POST">
	<label>enter a number for calories >= 0</label>
	<br>
    <input type = "text" name="calories" placeholder ="calories">
    <br>
	<label>enter a number for total fat >= 0</label>
	<br>
    <input type = "text" name="tot_fat" placeholder ="total fat">
    <br>
	<label>enter a number for saturated fat >= 0</label>
	<br>
    <input type = "text" name="sat_fat" placeholder ="saturated fat">
    <br>
	<label>enter a number for cholesterol >= 0</label>
	<br>
    <input type = "text" name="cholesterol" placeholder ="cholesterol">
    <br>
	<label>enter a number for sodium >= 0</label>
	<br>
    <input type = "text" name="sodium" placeholder ="sodium">
    <br>
	<label>enter a number for total carbohydrates >= 0</label>
	<br>
    <input type = "text" name="tot_carbs" placeholder ="total carbohydrates">
    <br>
	<label>enter a number for dietary fiber >= 0</label>
	<br>
    <input type = "text" name="diet_fiber" placeholder ="dietary fiber">
    <br>
	<label>enter a number for total sugars >= 0</label>
	<br>
    <input type = "text" name="tot_sug" placeholder ="total sugars">
    <br>
	<label>enter a number for protein >= 0</label>
	<br>
    <input type = "text" name="protein" placeholder ="protein">
    <br>
    <button type="submit" name="submit" class="button"> add nutrition</button>    
</form>
</div>

<div class="tables">
<?php
	$sql = "SELECT * FROM nutrition_profile;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
		echo "<table>";
		echo "<tr><th>candy_name</th><th>calories</th><th>tot_fat</th><th>sat_fat</th><th>cholesterol</th><th>sodium</th><th>tot_carbs</th><th>diet_fiber</th><th>tot_sug</th><th>protein</th></tr>";
        	while($row= mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["candy_name"]."</td><td>".$row["calories"]."</td><td>".$row["tot_fat"]."</td><td>".$row["sat_fat"]."</td><td>".$row["cholesterol"]."</td><td>".$row["sodium"]."</td><td>".$row["tot_carbs"]."</td><td>".$row["diet_fiber"]."</td><td>".$row["tot_sug"]."</td><td>".$row["protein"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
</div>

<div class="back">
<a href="flavor.php" class="button">add another flavor</a>
</div>
</div>

</body>
</html>
