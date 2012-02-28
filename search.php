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
<?php
   include('index.php');
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Search</title>
  
</head>

<body>
<div id = "wrap">
<div id = "content-wrap">
<div id="content">
  <h1>Search</h1>
  <form method="post" action="search.php">
	<label for="username">Search:</label>
    <input type="text" id="search1" name="search1" />
    <input type="submit" value="go" name="submit" />
  
  
  <?php
  include('db_connect.php');
  
  
  if (isset($_POST['search1']))
  {
  	$searchterm = mysqli_real_escape_string($db, trim($_POST['search1']));

  	
  		$query = "SELECT mix_drinks.drink_name, ingredients.ingredient, strength.strength, difficulty.difficulty FROM 
		mix_drinks inner join ingredients on mix_drinks.drink_id = ingredients.drink_id 
		inner join difficulty on mix_drinks.difficulty_id = difficulty.difficulty_id 
		inner join strength on mix_drinks.strength_id = strength.strength_id
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
				echo "<table BORDER=4 CELLSPACING=4 CELLPADDING=4 id=\"hor-minimalist-b\">\n
				<tr><th>Drink Name</th><th>Strength</th><th>Difficulty</th><th>Ingredient</th></tr>\n\n";
				$strength = $row['strength'];
				$strength = ucfirst($strength);
				$difficulty = $row['difficulty'];
				$difficulty = ucfirst($difficulty);
				$ingredient = $row['ingredient'];
				echo "<tr><td>$name</td><td >$strength</td><td>$difficulty</td><td >$ingredient";
				$count++;
			}
			else if ($name1 == $name)
			{
				$ingredient = $row['ingredient'];
				echo ", $ingredient";
			}
		  	else
			{
				echo "</td></tr>\n";
				$strength = $row['strength'];
				$strength = ucfirst($strength);
				$difficulty = $row['difficulty'];
				$difficulty = ucfirst($difficulty);
				$ingredient = $row['ingredient'];
				echo "<tr><td>$name</td><td >$strength</td><td>$difficulty</td><td >$ingredient";
			}
			
			$name1 = $row['drink_name'];
	    }
		
	   
		
		if ($count == 0)
		{
			
			echo "<table><tr><td>Search item not found</td></tr>";
		}
		 echo "</table>\n"; 
  	}
  	
  
  ?>
  <p>&nbsp;</p><p><a href="logout.php">logout</a></p>
  </form>
  </div>
  </div>
  </div>
</body>
</html>
