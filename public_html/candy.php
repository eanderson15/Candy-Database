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
<form action = "candyinfo.inc.php" method="POST">
	<label>name of candy must be unique</label>
	<br>
    <input type = "text" name="name" placeholder ="name">
    <br>
	<label>sweet rating is in range 1-10</label>
	<br>
    <input type = "text" name="sweet" placeholder ="sweet rating">
    <br>
	<label>bitter rating is in range 1-10</label>
	<br>
    <input type = "text" name="bitter" placeholder ="bitter rating">
    <br>
	<label>input 'yes' or 'no' if the candy is approved by kindergartners</label>
	<br>
    <input type = "text" name="kind" placeholder ="k approved?">
    <br>
	<label>description of type of candy (default: none)</label>
	<br>
    <input type = "text" name="type" placeholder ="type">
    <br>
	<label>salty rating is in range 1-10</label>
	<br>
    <input type = "text" name="salty" placeholder ="salty rating ">
    <br>
	<label>chocolate rating is in range 1-10</label>
	<br>
    <input type = "text" name="chocolate" placeholder ="chocolate rating">
    <br>
	<label>crunchy rating is in range 1-10</label>
	<br>
    <input type = "text" name="crunchy" placeholder ="crunchy rating">
    <br>
	<label>chewy rating is in range 1-10</label>
	<br>
    <input type = "text" name="chewy" placeholder ="chewy rating">
    <br>
	<label>sour rating is in range 1-10</label>
	<br>
    <input type = "text" name="sour" placeholder ="sour rating">
    <br>
    <button type="submit" name="submit" class="button"> make candy</button>    
</form>
</div>

<div class="forms">
<form action = "candydelinfo.inc.php" method="POST">
	<label>name of candy to delete</label>
	<br>
    <input type = "text" name="name" placeholder ="candy name">
    <br>
    <button type="submit" name="submit" class="button">delete candy</button>    
</form>
</div>

<div class="tables">
<?php
	$sql = "SELECT * FROM candy_profile;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = (mysqli_num_rows($result));
	if($resultCheck >  0) {
		echo "<table>";
		echo "<tr><th>candy_name</th><th>sweet</th><th>bitter</th><th>k_approved</th><th>type</th><th>salty</th><th>chocolate</th><th>crunchy</th><th>chewy</th><th>sour</th></tr>";
        	while($row= mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$row["candy_name"]."</td><td>".$row["sweet"]."</td><td>".$row["bitter"]."</td><td>".$row["k_approved"]."</td><td>".$row["type"]."</td><td>".$row["salty"]."</td><td>".$row["chocolate"]."</td><td>".$row["crunchy"]."</td><td>".$row["chewy"]."</td><td>".$row["sour"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
</div>

<div class="back">
<a href="site.php" class="button">go home</a>
</div>
</div>

</body>
</html>
