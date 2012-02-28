<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--
Copyright: Daemon Pty Limited 2006, http://www.daemon.com.au
Community: Mollio http://www.mollio.org $
License: Released Under the "Common Public License 1.0", 
http://www.opensource.org/licenses/cpl.php
License: Released Under the "Creative Commons License", 
http://creativecommons.org/licenses/by/2.5/
License: Released Under the "GNU Creative Commons License", 
http://creativecommons.org/licenses/GPL/2.0/
-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Drink Recipes: Browse</title>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
<script type="text/javascript" src="js/common.js"></script>
</head>
<body id="type-a">
<?php
   include('header.php');
  include "db_connect.php";
?>
<div id="wrap">

	<!--<div id="header">
		<div id="site-name">Drink Recipes</div>
		<div id="search">
			
		</div>
		<ul id="nav">
		<li class="active"><a href="index.html">Home</a></li>
		<li><a href="register.php">Register</a>
			
		</li>
		<li><a href="login.php">Login</a>
			
		</li>
		<li><a href="search.php">Search</a>
			
		</li>
		</ul>
	</div>-->
	

<font size = 6><center>Browse a Listing of all of our drinks!</font><br>
<br><font size = 3>
<a href="#Cosmo">[Cosmopolitan]</a> 
<a href="#Long Island">[Long Island Iced Tea]</a> 
<a href="#Daiquiri">[Daiquiri]</a> 
<a href="#Mai Tai">[Mai Tai]</a> 
<a href="#Manhattan">[Manhattan]</a> 
<a href="#Pina">[Pina Colada]</a> 
<a href="#Mojito">[Mojito]</a> 
<a href="#Margarita">[Margarita]</a> 
<a href="#Martini">[Martini]</a> 
<a href="#Beach">[Sex on the Beach]</a> 
<br><br></center>
<font size=4>
<img alt="cosmo" src="cosmo.jpg" align=left>

<a name="Cosmo"></a> 	
<font size = 5>Cosmopolitan:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Cosmopolitan'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br>

<img alt="Long Island" src="long island.jpg" align=left>	
<a name="Long Island"></a> 
<font size=5>Long Island Iced Tea:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Long Island Iced Tea'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br>

<img alt="daiquiri" src="daiquiri.jpg" align=left>	
<a name="Daiquiri"></a> 
<font size = 5>Daiquiri:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Daiquiri'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br><br>

<img alt="Mai Tai" src="mai tai.jpg" align=left>	
<a name="Mai Tai"></a> 
<font size = 5>Mai Tai:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Mai Tai'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br>

<img alt="Manhattan" src="manhattan.jpg" align=left>	
<a name="Manhattan"></a> 
<font size = 5>Manhattan:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Manhattan'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br><br>

<img alt="Pina Colada" src="pina.jpg" align=left>
<a name="Pina"></a> 
<font size =5>Pina Colada:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Pina Colada'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br>

<img alt="Mojito" src="mojito.jpg" align=left>	
<a name="Mojito"></a> 
<font size = 5>Mojito:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Mojito'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br>

<img alt="Margarita" src="margarita.jpg" align=left>	
<a name="Margarita"></a> 
<font size = 5>Margarita:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Margarita'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br><br>

<img alt="Martini" src="martini.jpg" align=left>	
<a name="Martini"></a> 
<font size = 5>Martini:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Martini'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br>

<img alt="Sex on the Beach" src="beach.jpg" align=left>	
<a name="Beach"></a> 
<font size = 5>Sex on the Beach:</font><br>
<?php
//get drink id
$drink_name_query = "SELECT drink_id FROM mix_drinks WHERE drink_name = 'Sex on the Beach'";
$drink_name_result = mysqli_query($db, $drink_name_query)
	or die("Error Querying Database");
while($drink_name_row = mysqli_fetch_array($drink_name_result)){
	$drink = $drink_name_row['drink_id'];
} 
//get drink ingredients
$query = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id = '$drink'";
$result = mysqli_query($db, $query)
	or die("Error Querying Database1");
echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
while($row = mysqli_fetch_array($result)){
	$ingredients = $row['ingredient'];
	$amount = $row['ingredient_amount'];	
	echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";	
}
echo "</table>\n" 
?>

<br><br><br><br>


	<div id="content-wrap">
	
		<div id="content">
		
		
		
		</div>
		
		
		
	</div>

</div>
</body>
</html>
