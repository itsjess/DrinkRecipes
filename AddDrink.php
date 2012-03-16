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
<?php
include('header.php');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add A Drink</title>
<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/ie6_or_less.css" />
<![endif]-->
<script type="text/javascript" src="js/common.js"></script>
</head>
<body id="type-a">  
<div id="content-wrap">
<div id="content">
<div id="wrap">

<font size = 6><center>Add A Drink</center></font><br>
<?php
    require_once('appvars.php');
	include('db_connect.php');
	
	if (isset($_POST['submit'])) {

    // Grab the score data from the POST
    $drink_name = mysqli_real_escape_string($db, trim($_POST['drink_name']));
    
	$ingredient1 = mysqli_real_escape_string($db, trim($_POST['ingredient1']));
	$ingredient_amount1 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount1']));
	
	$ingredient2 = mysqli_real_escape_string($db, trim($_POST['ingredient2']));
	$ingredient_amount2 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount2']));
	
	$ingredient3 = mysqli_real_escape_string($db, trim($_POST['ingredient3']));
	$ingredient_amount3 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount3']));
	
	$ingredient4 = mysqli_real_escape_string($db, trim($_POST['ingredient4']));
	$ingredient_amount4 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount4']));
	
	$ingredient5 = mysqli_real_escape_string($db, trim($_POST['ingredient5']));
	$ingredient_amount5 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount5']));
    
	$screenshot = mysqli_real_escape_string($db, trim($_FILES['image']['name']));
    $screenshot_type = $_FILES['image']['type'];
    $screenshot_size = $_FILES['image']['size']; 
	
	$strength = mysqli_real_escape_string($db, trim($_POST['strength']));
	
	$difficulty = mysqli_real_escape_string($db, trim($_POST['difficulty']));
	
	$directions = mysqli_real_escape_string($db, $_POST['directions']);

    if (!empty($drink_name) && 	!empty($screenshot)) {
      
	  if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
        
		if ($_FILES['image']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot;
          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		  
            // Write the data to the database
            $create_drink_query = "INSERT INTO mix_drinks (drink_id, drink_name, strength_id, difficulty_id, image) VALUES (0, '$drink_name', 
			(select strength_id from strength where strength = '$strength'), (select difficulty_id from difficulty where difficulty = '$difficulty'),
			'$screenshot')";
			
            mysqli_query($db, $create_drink_query)
			or die ("Error in create drinks");
			
			$get_drink_id_query = "select drink_id from mix_drinks where drink_name = '$drink_name' && image = '$screenshot'";
			
			 $result = mysqli_query($db, $get_drink_id_query)
			 or die ("Error in drink_id");
			
			while($row = mysqli_fetch_array($result))
			{
				$drink_id = $row['drink_id'];
				
				if (!empty($ingredient1) && !empty($ingredient_amount1) && is_numeric($ingredient_amount1))
				{
				
				$create_ingredient_query = "insert into ingredients values (0, '$ingredient1', $ingredient_amount1, $drink_id)";
				
				mysqli_query($db, $create_ingredient_query)
				or die ("Error in create ingredient 1");
				
				}
				
				if (!empty($ingredient2) && !empty($ingredient_amount2) && is_numeric($ingredient_amount2))
				{
				$create_ingredient_query = "insert into ingredients values (0, '$ingredient2', $ingredient_amount2, $drink_id)";
				
				mysqli_query($db, $create_ingredient_query)
				or die ("Error in create ingredient 2");
				
				}
				
				if (!empty($ingredient3) && !empty($ingredient_amount3) && is_numeric($ingredient_amount3))
				{
				$create_ingredient_query = "insert into ingredients values (0, '$ingredient3', $ingredient_amount3, $drink_id)";
				
				mysqli_query($db, $create_ingredient_query)
				or die ("Error in create ingredient 3");
				
				}
				
				if (!empty($ingredient4) && !empty($ingredient_amount4) && is_numeric($ingredient_amount4))
				{
				$create_ingredient_query = "insert into ingredients values (0, '$ingredient4', $ingredient_amount4, $drink_id)";
				
				mysqli_query($db, $create_ingredient_query)
				or die ("Error in create ingredient 4");
				
				}
				
				if (!empty($ingredient5) && !empty($ingredient_amount5) && is_numeric($ingredient_amount5))
				{
				$create_ingredient_query = "insert into ingredients values (0, '$ingredient5', $ingredient_amount5, $drink_id)";
				
				mysqli_query($db, $create_ingredient_query)
				or die ("Error in create ingredient 5");
				
				}
				
				if (!empty($directions))
				{
					$create_directions_query = "insert into directions values (0, '$directions')";
					
					mysqli_query($db, $create_directions_query)
						or die ("Error in create directions");
					
					$get_direction_id_query = "select direction_id from directions where directions = '$directions'";
					
					$result1 = mysqli_query($db, $get_direction_id_query)
						or die ("Error in directions");
						
					while($row = mysqli_fetch_array($result1))
					{
						$direction_id = $row['direction_id'];
					}
					
					$create_mix_drinks_query = "update mix_drinks set direction_id = '$direction_id' where drink_id = '$drink_id'";	
					
					mysqli_query($db, $create_mix_drinks_query)
						or die ("Error in create mix drinks");
					
				}
				else
				{
					$create_directions_query = "update mix_drinks set direction_id = 5 where drink_id = '$drink_id'";
				
					mysqli_query($db, $create_directions_query)
						or die ("Error in create directions");
				}
			}
			
			

            // Confirm success with the user
            echo '<p>Thanks for adding a drink! It will be reviewed and added to the drink list as soon as possible.</p>';
            echo '<p><strong>Drink Name:</strong> ' . $drink_name . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
            echo '<p><a href="browse.php">&lt;&lt; Back to browse page</a></p>';

            // Clear the score data to clear the form
            $drink_name = "";
    		$ingredient1 = "";
			$ingredient_amount1 = "";
			$ingredient2 = "";
			$ingredient_amount2 = "";
			$ingredient3 = "";
			$ingredient_amount3 = "";
			$ingredient4 = "";
			$ingredient_amount4 = "";
			$ingredient5 = "";
			$ingredient_amount5 = "";
			$screenshot = "";
			$strength = "";
			$difficulty = "";
			$direction_id = "";
			$directions = "";

            mysqli_close($db);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter correct information to add a drink.</p>';
    }
  }
?>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    
	<label for="drink_name">Drink Name:</label>
    <input type="text" id="drink_name" name="drink_name" value="<?php if (!empty($drink_name)) echo $drink_name; ?>" /><br />
    
	<label for="ingredient1">Ingredient 1:</label>
    <input type="text" id="ingredient1" name="ingredient1" value="<?php if (!empty($ingredient1)) echo $ingredient1; ?>" /><br />
	
	<label for="ingredient_amount1">Ingredient 1 amount in ounces:</label>
    <input type="text" id="ingredient_ amount1" name="ingredient_amount1" value="<?php if (!empty($ingredient_amount1)) echo $ingredient_amount1; ?>" /><br />
	
	<label for="ingredient2">Ingredient 2:</label>
    <input type="text" id="ingredient2" name="ingredient2" value="<?php if (!empty($ingredient2)) echo $ingredient2; ?>" /><br />
	
	<label for="ingredient_amount2">Ingredient 2 amount in ounces:</label>
    <input type="text" id="ingredient_ amount2" name="ingredient_amount2" value="<?php if (!empty($ingredient_amount2)) echo $ingredient_amount2; ?>" /><br />
	
	<label for="ingredient3">Ingredient 3:</label>
    <input type="text" id="ingredient3" name="ingredient3" value="<?php if (!empty($ingredient1)) echo $ingredient3; ?>" /><br />
	
	<label for="ingredient_amount3">Ingredient 3 amount in ounces:</label>
    <input type="text" id="ingredient_ amount3" name="ingredient_amount3" value="<?php if (!empty($ingredient_amount3)) echo $ingredient_amount3; ?>" /><br />
	
	<label for="ingredient4">Ingredient 4:</label>
    <input type="text" id="ingredient4" name="ingredient4" value="<?php if (!empty($ingredient4)) echo $ingredient4; ?>" /><br />
	
	<label for="ingredient_amount4">Ingredient 4 amount in ounces:</label>
    <input type="text" id="ingredient_ amount4" name="ingredient_amount4" value="<?php if (!empty($ingredient_amount4)) echo $ingredient_amount4; ?>" /><br />
	
	<label for="ingredient5">Ingredient 5:</label>
    <input type="text" id="ingredient5" name="ingredient5" value="<?php if (!empty($ingredient5)) echo $ingredient5; ?>" /><br />
	
	<label for="ingredient_amount5">Ingredient 5 amount in ounces:</label>
    <input type="text" id="ingredient_ amount5" name="ingredient_amount5" value="<?php if (!empty($ingredient_amount5)) echo $ingredient_amount5; ?>" /><br />
	
	<label for="difficulty">Difficulty</label>
	<select name="difficulty">
					<option>Easy</option>
					<option>Regular</option>
					<option>Hard</option>
					</select>
					
					
	<label for="strength">Strength</label>
	<select name="strength">
					<option>Weak</option>
					<option>Regular</option>
					<option>Strong</option>
					</select>				
					
	<label for="directions">Directions:</label>
    <textarea name="directions"> </textarea><br />	
	
    <label for="image">Picture of Drink:</label>
    <input type="file" id="image" name="image" />
	
    <input type="submit" value="Add" name="submit" />
	
</div>

</div>
</body>
</html>