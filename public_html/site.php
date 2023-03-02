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
<link href="styles.css" rel="stylesheet">

</head>
<body>
<div class="candyland">
Candyland
</div>
<div class="top">
<a href="candy.php" class = "frontbutton">candy</a>
<a href="warehouseform.php" class ="frontbutton">warehouse</a>
<a href="storeadd.php" class ="frontbutton">store</a>
<a href="canshipto.php" class ="frontbutton">warehouse can ship to store</a>
<a href="storeinv.php" class = "frontbutton">store inventory</a>
<a href="wareinv.php" class = "frontbutton">warehouse inventory</a>
</div>
<div style="width:100%;float:left;">
<div class="formsfront">
<form action = "candysearch.inc.php" method="POST">
	<label>name or type of candy to find</label>
	<br>
    <input type = "text" name="key" placeholder ="candy name">
    <br>
    <button type="submit" name="submit" class="button">find candy</button>    
</form>
</div>

<div class="formsfront">
<form action = "warecandy.inc.php" method="POST">
	<label>id number of store to ship to</label>
	<br>
    <input type = "text" name="num" placeholder ="store number">
    <br>
	<label>name of candy to ship</label>
	<br>
    <input type = "text" name="key" placeholder ="candy name">
    <br>
	<label>quantity of candy to ship</label>
	<br>
    <input type = "text" name="amount" placeholder ="needed amount of candy">
    <br>
    <button type="submit" name="submit" class="button">find warehouse that can ship</button>    
</form>
</div>

<div class="formsfront">
<form action = "storecandy.inc.php" method="POST">
	<label>id number of store to search</label>
	<br>
	<input type = "text" name="num" placeholder ="store number">
    <br>
	<label>name of candy to find</label>
	<br>
    <input type = "text" name="key" placeholder ="candy name">
    <br>
    <button type="submit" name="submit" class="button">find quantity of candy that store has</button>    
</form>
</div>
</div>
<div style="width: 100%;float:left;">
<div class="formsfront">
<form action = "candyfilter.inc.php" method="POST">
	<label>enter {1: sweet; 2: bitter; 3: salty; 4: chocolate; 5: crunchy; 6: chewy; 7: sour}</label>
	<br>
	<input type = "text" name="num" placeholder ="number of attribute from above list">
    <br>
	<label>minimum rating of chosen attribute in range 1-10</label>
	<br>
    <input type = "text" name="key" placeholder ="minimum rating">
    <br>
    <button type="submit" name="submit" class="button">find stores that have this type of candy</button>    
</form>
</div>
</div>



</body>
</html>
