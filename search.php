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
<title>Drink Recipes</title>
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
?>
 
<div id="wrap">
<div id="content-wrap">
<div id="content">

  <h1>Search</h1>
  <form method="post" action="search.php">
	<label for="username">Search:</label>
    <input type="text" id="search1" name="search1" />
    <input type="submit" value="go" name="submit" />
  
  
  <?php
  include('db_connect.php');
  require_once('appvars.php');
  if(isset($_SESSION['user_id'])){
		$username = $_SESSION['user_name'];
		$completedDrinksQuery = "SELECT user_name AS User, drink_name AS Drink
						FROM junction
						JOIN users ON users.user_id = junction.user_id
						JOIN mix_drinks ON mix_drinks.drink_id = junction.drink_id
						WHERE user_name = '$username'";
		$completedDrinksResult = mysqli_query($db, $completedDrinksQuery) or die ("Could not get completed drinks.");
		$myDrinks = array();
		while($drinksRow = mysqli_fetch_array($completedDrinksResult)){
			array_push($myDrinks, $drinksRow['Drink']);
		}
	}
  
  
  if (isset($_POST['search1']))
  {
  	$searchterm = mysqli_real_escape_string($db, trim($_POST['search1']));

  	
  		$query = "SELECT mix_drinks.drink_name, ingredients.ingredient, strength.strength, difficulty.difficulty, mix_drinks.image, directions.directions FROM 
		mix_drinks inner join ingredients on mix_drinks.drink_id = ingredients.drink_id 
		inner join difficulty on mix_drinks.difficulty_id = difficulty.difficulty_id 
		inner join strength on mix_drinks.strength_id = strength.strength_id
		inner join directions on mix_drinks.direction_id = directions.direction_id
		where mix_drinks.drink_name LIKE '%$searchterm%'OR difficulty.difficulty LIKE '%$searchterm%'  OR strength.strength like '%$searchterm%' 
		OR ingredients.ingredient like '%$searchterm%'
		order by mix_drinks.drink_name";
  
  		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
   		
		
		$name1 = "";
		$count = 0;
   		while($row = mysqli_fetch_array($result)) {
  			
			$name = $row['drink_name'];
			
			if ($count == 0)
			{
				echo "<table BORDER=1 CELLSPACING=4 CELLPADDING=4 id=\"hor-minimalist-b\">\n
				<tr><th>Drink Name</th><th>Image</th><th>Strength</th><th>Difficulty</th><th>Directions</th><th>Ingredient</th>";
				if (isset($_SESSION['user_id'])){ echo "<th>Completed?</th>";}
				echo "</tr>\n\n";
				$strength = $row['strength'];
				$strength = ucfirst($strength);
				$difficulty = $row['difficulty'];
				$difficulty = ucfirst($difficulty);
				$ingredient = $row['ingredient'];
				$directions = $row['directions'];
				
				echo "<tr><td>$name</td>";
				if (is_file(GW_UPLOADPATH . $row['image']) && filesize(GW_UPLOADPATH . $row['image']) > 0) {
					echo '<td><img src="' . GW_UPLOADPATH . $row['image'] . '" alt="Score image" /></td>';
				}
				else {
					echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td>';
				}
				echo "</td><td >$strength</td><td>$difficulty</td><td>$directions</td><td >$ingredient";
				$count++;
			}
			else if ($name1 == $name)
			{
				$ingredient = $row['ingredient'];
				echo ", $ingredient";
				
			}
		  	else
			{
				echo "</td>";
				if(isset($_SESSION['user_id'])){
				if (in_array($name1, $myDrinks)) {
						echo "<td>Already Completed!</td>";
				}
				else{
							echo "<td><a href=\"madeDrink.php?drink=$name1\">I Made This</a></td>";
				}
				}	
				echo "</tr>\n";
				$strength = $row['strength'];
				$strength = ucfirst($strength);
				$difficulty = $row['difficulty'];
				$difficulty = ucfirst($difficulty);
				$ingredient = $row['ingredient'];
				$directions = $row['directions'];
				
				echo "<tr><td>$name</td>";
				if (is_file(GW_UPLOADPATH . $row['image']) && filesize(GW_UPLOADPATH . $row['image']) > 0) {
					echo '<td><img src="' . GW_UPLOADPATH . $row['image'] . '" alt="Score image" /></td>';
				}
				else {
					echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td>';
				}
				echo "</td><td >$strength</td><td>$difficulty</td><td>$directions</td><td >$ingredient";
				
			}
			
			$name1 = $row['drink_name'];
	    }
		if($count > 0)
		{
			if (isset($_SESSION['user_id'])){
				if (in_array($name1, $myDrinks)) {
						echo "<td>Already Completed!</td>";
				}
				else{
							echo "<td><a href=\"madeDrink.php?drink=$name1\">I Made This</a></td>";
				}
						
					
				
				
			
			}
		}
			mysqli_close($db);
		
	   
		
		if ($count == 0)
		{
			
			echo "<table><tr><td>Search item not found</td></tr>";
		}
		 echo "</table>\n"; 
  	}
  	
  
  ?>
  
  </form>
  </div>
  </div>
  </div>
</body>
</html>
