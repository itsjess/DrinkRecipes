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
<div id="content-wrap">
<div id="content">
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
	
<h1>Browse All Drinks!</h1>
<br><font size = 3>
<a href="#A">[A]</a> 
<a href="#B">[B]</a> 
<a href="#C">[C]</a>
<a href="#D">[D]</a> 
<a href="#E">[E]</a>
<a href="#F">[F]</a>
<a href="#G">[G]</a>
<a href="#H">[H]</a>
<a href="#I">[I]</a>
<a href="#J">[J]</a>
<a href="#K">[K]</a>
<a href="#L">[L]</a>
<a href="#M">[M]</a> 
<a href="#N">[N]</a>
<a href="#O">[O]</a>
<a href="#P">[P]</a> 
<a href="#Q">[Q]</a> 
<a href="#R">[R]</a>
<a href="#S">[S]</a> 
<a href="#T">[T]</a>
<a href="#U">[U]</a>
<a href="#V">[V]</a>
<a href="#W">[W]</a>
<a href="#X">[X]</a>
<a href="#Y">[Y]</a>
<a href="#Z">[Z]</a>

<br></center>
<font size=4>

<blockquote><h3>Recently Added Drinks:</h3></blockquote>
<?php
	$query = "SELECT * FROM mix_drinks";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	
	$numDrink = (count($row) - 1);

	for ( $i = $numDrink; $i >= ($numDrink - 3); $i--)
	{
		$query = "SELECT drink_name FROM mix_drinks WHERE drink_id = $i";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		$drinkName = $row[0];

		$query = "SELECT image FROM mix_drinks WHERE drink_id = $i";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_array($result);
		$drinkImage = $row[0];
				
		echo "<a href = \"browse.php#$drinkName\"><img src= \"images/$drinkImage\" height=150 width=auto title = \"$drinkName\" /></a>";

	}
?>

<?php
//count through letters
foreach(range('A','Z') as $i) {
	//header
	echo "<a name='$i'><h2><?= $i ?> $i </h2></a>";
	//get the drink by each letter
        $query = "SELECT * FROM mix_drinks WHERE drink_name LIKE '$i%' order by drink_name";
	$result = mysqli_query($db, $query)
		or die("Error Querying Database A");
	while($row = mysqli_fetch_array($result)){

		//print drink name        		
		$id = $row['drink_id'];
       		$name = $row['drink_name'];
		$image = $row['image'];
       		echo "<a name='$name'><h5>$name</h5></a>";
		$picture = "<img src=\"images/$image\" alt=\"Drink Image\" height=100 width=100>";
		$query_ing = "SELECT ingredient, ingredient_amount FROM ingredients WHERE drink_id =$id";		
		$result_ing = mysqli_query($db, $query_ing)
			or die("Error Querying Database A");
		//ingredients		
		echo $picture, "<table id=\"hor-minimalist-b\">\n<tr><th>Amount</th><th>Ingredients</th><tr>\n\n";
		while($row_ing = mysqli_fetch_array($result_ing)){       			
			$ingredients = $row_ing['ingredient'];
			$amount = $row_ing['ingredient_amount'];	
			echo "<tr><td >$amount part(s)...</td><td >$ingredients</td></tr>\n";

		}
		echo "</table>";	
		//directions
		$query_dir = "SELECT directions FROM directions WHERE direction_id = $id";
		$result_dir = mysqli_query($db, $query_dir)
			or die("Error Querrying Database B");
		echo "<table id=\"hor-minimalist-b\">\n<tr><th>Directions</th><tr>\n\n";
		while($row_dir = mysqli_fetch_array($result_dir)){
			$directions = $row_dir['directions'];
			echo "<tr><td >$directions </td></tr>\n";
		}
		echo "</table>";


		//check made this		
		if (isset($_SESSION['user_id'])){		
			echo "</br><a href=\"madeDrink.php?drink=$name\">I Made This!</a>";
		}
    	}
}
?>


<br><br><br><br>


	<div id="content-wrap">
	
		<div id="content">
		
		
		
		</div>
		
		
		
	</div>

</div>
</body>
</html>
