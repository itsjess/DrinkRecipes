<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
  <h1>Search</h1>
  <form method="post" action="search.php">
    <label for="username">Search:</label>
    <input type="text" id="search" name="search" />
    <input type="submit" value="go" name="submit" />
  </form>
  
  <?php
  include('db_connect.php');
  
  
  if (isset($_POST['search']))
  {
  	$searchterm = mysqli_real_escape_string($db, trim($_POST['search']));

  	
  		$query = "SELECT mix_drinks.drink_name, ingredients.ingredient, strength.strength, difficulty.difficulty FROM 
		mix_drinks inner join ingredients on mix_drinks.drink_id = ingredients.drink_id 
		inner join difficulty on mix_drinks.difficulty_id = difficulty.difficulty_id 
		inner join strength on mix_drinks.strength_id = strength.strength_id
		where mix_drinks.drink_name LIKE '%$searchterm%'OR difficulty.difficulty LIKE '%$searchterm%'  OR strength.strength like '%$searchterm%' 
		OR ingredients.ingredient like '%$searchterm%'
		order by mix_drinks.drink_name";
  
  		$result = mysqli_query($db, $query)
   			or die("Error Querying Database");
   		echo "<table id=\"hor-minimalist-b\">\n<tr><th>Drink Name</th><th>Strength</th><th>Difficulty</th><th>Ingredient</th><tr>\n\n";
		
		$name1 = "";
		$count = 0;
   		while($row = mysqli_fetch_array($result)) {
  			
			$name = $row['drink_name'];
			
			if ($count == 0)
			{
				$strength = $row['strength'];
				$difficulty = $row['difficulty'];
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
				$difficulty = $row['difficulty'];
				$ingredient = $row['ingredient'];
				echo "<tr><td>$name</td><td >$strength</td><td>$difficulty</td><td >$ingredient";
			}
			
			$name1 = $row['drink_name'];
	    }
	    echo "</table>\n"; 
		
  	}
  	
  
  ?>
  <p>&nbsp;</p><p><a href="logout.php">logout</a></p>
  </div>
</body>
</html>
