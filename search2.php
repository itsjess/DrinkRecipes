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
<div>
  <h1>Search</h1>
  <form method="post" action="search.php">
	<label for="username">Search by drink name:</label>
    <input type="text" id="search1" name="search1" />
    <input type="submit" value="go" name="submit" />
  
  
  <?php
  include('db_connect.php');
  
  
  if (isset($_POST['search1']))
  {
  	$searchterm = mysqli_real_escape_string($db, trim($_POST['search1']));

  	
  		$drink_name_query = "select * from mix_drinks where drink_name LIKE '%$searchterm%'";
		
  
  		$result = mysqli_query($db, $drink_name_query)
   			or die("Error Querying Database");
   		
		echo "<table BORDER=4 CELLSPACING=4 CELLPADDING=4 id=\"hor-minimalist-b\">\n
			<tr><th>Drink Name</th><th>Strength</th><th>Difficulty</th><th>Ingredient</th></tr>\n\n";
		$count = 0;
   		while($row = mysqli_fetch_array($result)) {
  			
			
				
			$name = $row['drink_name'];
			$drink_id = $row['drink_id'];
			$strength_id = $row['strength_id'];
			$difficulty_id = $row['difficulty_id'];
			
			$count++;	
			$name = ucfirst($name);
			echo "<tr><td>$name</td>";
	    
		
			if ($count > 0)
			{
				$drink_strength_query = "select * from strength where strength_id = '$strength_id'";
				
				$result_strength = mysqli_query($db, $drink_strength_query)
				or die("Error Querying Database");
				
				while($row = mysqli_fetch_array($result_strength)){
					$strength = $row['strength'];
					$strength = ucfirst($strength);
					echo "<td>$strength</td>";
				}
				
				$drink_difficulty_query = "select * from difficulty where difficulty_id = '$difficulty_id'";
				
				$result_difficulty = mysqli_query($db, $drink_difficulty_query)
				or die("Error Querying Database");
				
				while($row = mysqli_fetch_array($result_difficulty)){
					$difficulty = $row['difficulty'];
					$difficulty = ucfirst($difficulty);
					echo "<td>$difficulty</td>";
				}
				
				$drink_ingredients_query = "select * from ingredients where drink_id = '$drink_id'";
				
				$result_ingredients = mysqli_query($db, $drink_ingredients_query)
				or die("Error Querying Database");
				
				echo "<td>";
				
				while($row = mysqli_fetch_array($result_ingredients)){
					$ingredient = $row['ingredient'];
					echo "$ingredient, ";
				}
				
				echo "</td></tr>\n\n"; 
			}
	   
		}
		if ($count == 0)
		{
			
			echo "<table><tr><td>Search item not found</td></tr>";
		}
		 echo "</table>"; 
  	}
  	
  
  ?>
  <p>&nbsp;</p><p><a href="logout.php">logout</a></p>
  </form>
  </div>
</body>
</html>
