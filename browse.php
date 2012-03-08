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
<a href="#a">[A]</a> 
<a href="#b">[B]</a> 
<a href="#c">[C]</a>
<a href="#d">[D]</a> 
<a href="#e">[E]</a>
<a href="#f">[F]</a>
<a href="#g">[G]</a>
<a href="#h">[H]</a>
<a href="#i">[I]</a>
<a href="#j">[J]</a>
<a href="#k">[K]</a>
<a href="#l">[L]</a>
<a href="#m">[M]</a> 
<a href="#n">[N]</a>
<a href="#o">[O]</a>
<a href="#p">[P]</a> 
<a href="#q">[Q]</a> 
<a href="#r">[R]</a>
<a href="#s">[S]</a> 
<a href="#t">[T]</a>
<a href="#u">[U]</a>
<a href="#v">[V]</a>
<a href="#w">[W]</a>
<a href="#x">[X]</a>
<a href="#y">[Y]</a>
<a href="#z">[Z]</a>

<br><br></center>
<font size=4>

<a name="a"></a>
<?php
//count through letters
foreach(range('A','Z') as $i) {
	//header
        echo "<h2>$i</h2>";
	//get the drink by each letter
        $query = "SELECT * FROM mix_drinks WHERE drink_name LIKE '$i%' order by drink_name";
	$result = mysqli_query($db, $query)
		or die("Error Querying Database A");
	while($row = mysqli_fetch_array($result)){
		//print drink name        		
		$id = $row['drink_id'];
       		$name = $row['drink_name'];
       		//$pictureURL = $row['picture'];
       		//$ingredients = $row['ingredients'];
       		//echo "<img src=\"$pictureURL\" />";
       		echo "<h5>$name</h5>";
		$query_ing = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id =$id";
		$result_ing = mysqli_query($db, $query_ing)
			or die("Error Querying Database A");
		echo "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
		while($row_ing = mysqli_fetch_array($result_ing)){
       			$ingredients = $row_ing['ingredient'];
			$amount = $row_ing['ingredient_amount'];	
			echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";
		}	
    	}
}
?>

<br><br>

<a name="b"></a>

<br><br>

<a name="c"></a>
<img alt="cosmo" src="images/cosmo.jpg" align=left> 	
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
<a name="Long Island"></a> 

<img alt="Long Island" src="images/long island.jpg" align=left>	
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

<img alt="daiquiri" src="images/daiquiri.jpg" align=left>	
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

<img alt="Mai Tai" src="images/mai tai.jpg" align=left>	
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

<img alt="Manhattan" src="images/manhattan.jpg" align=left>	
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

<img alt="Pina Colada" src="images/pina.jpg" align=left>
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

<img alt="Mojito" src="images/mojito.jpg" align=left>	
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

<img alt="Margarita" src="images/margarita.jpg" align=left>	
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

<img alt="Martini" src="images/martini.jpg" align=left>	
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

<img alt="Sex on the Beach" src="images/beach.jpg" align=left>	
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
