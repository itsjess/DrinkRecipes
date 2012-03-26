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
	if (isset($_SESSION['user_id'])){	
		if (!isset($_POST['ingredient1'])){
			$drink_name = mysqli_real_escape_string($db, trim($_POST['drink_name']));
			$strength = mysqli_real_escape_string($db, trim($_POST['strength']));
			$difficulty = mysqli_real_escape_string($db, trim($_POST['difficulty']));
			$directions = mysqli_real_escape_string($db, $_POST['directions']);
			$userid  = mysqli_real_escape_string($db, $_SESSION['user_id']);
			
			
				if (isset($drink_name)) {
					if ((!empty($_FILES['image']['name'])) && (($_FILES['image']['type'] == 'image/gif') || ($_FILES['image']['type'] == 'image/jpeg') || 
					($_FILES['image']['type'] == 'image/pjpeg') || ($_FILES['image']['type'] == 'image/png')) && ($_FILES['image']['size'] > 0) 
					&& ($_FILES['image']['size'] <= GW_MAXFILESIZE)) {
					
						$screenshot = mysqli_real_escape_string($db, trim($_FILES['image']['name']));
						$screenshot_type = $_FILES['image']['type'];
						$screenshot_size = $_FILES['image']['size'];
						// Move the file to the target upload folder
						$target = GW_UPLOADPATH . $screenshot;
						move_uploaded_file($_FILES['image']['tmp_name'], $target);	
					}	
					else{
						$screenshot = 'nodrink.jpg';
					}

					// Write the data to the database
					$create_drink_query = "INSERT INTO mix_drinks (drink_id, drink_name, strength_id, difficulty_id, user_id, image) VALUES (0, '$drink_name', 
					(select strength_id from strength where strength = '$strength'), (select difficulty_id from difficulty where difficulty = '$difficulty'),
					'$userid','$screenshot')";
					
					mysqli_query($db, $create_drink_query)
					or die ("Error in create drinks");
						
					$_SESSION['drink_name'] = $drink_name;
					$_SESSION['screenshot'] = $screenshot;
					
					$get_drink_id_query = "select drink_id from mix_drinks where drink_name = '$drink_name' && image = '$screenshot'";
						
					$result = mysqli_query($db, $get_drink_id_query)
					or die ("Error in drink_id");
						
					while($row = mysqli_fetch_array($result))
					{
						$_SESSION['drink_id'] = $row['drink_id'];	
					}
				}
				else {
					  echo '<p class="error">Please enter correct information to add a drink.</p>';
					}
			}
			else{
				echo '<p> Done adding ingredients. Click link to view drink. ';	
				echo '<a href="ShowDrink.php">ShowDrink</a>';
			}
	}
	else{
		
		echo '<p class="error">You have to be logged in to add a drink.</p>';
	}
	?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<label for="ingredient1">Ingredient:</label>
<input type="text" id="ingredient1" name="ingredient1" value="<?php if (!empty($ingredient1)) echo $ingredient1; ?>" /><br />

<label for="ingredient_amount1">Ingredient amount in ounces:</label>
<input type="text" id="ingredient_ amount1" name="ingredient_amount1" value="<?php if (!empty($ingredient_amount1)) echo $ingredient_amount1; ?>" /><br />

<input type="submit" value="Add Ingredient"  name="submit" />
<?php
	
	if (isset($_POST['ingredient1']) && isset($_SESSION['user_id'])){
	
	$ingredient1 = mysqli_real_escape_string($db, trim($_POST['ingredient1']));
	$ingredient_amount1 = mysqli_real_escape_string($db, trim($_POST['ingredient_amount1']));
	$drink_id = $_SESSION['drink_id'];
	
	if (!empty($ingredient1) && !empty($ingredient_amount1) && is_numeric($ingredient_amount1))
	{
					
		$create_ingredient_query = "insert into ingredients values (0, '$ingredient1', $ingredient_amount1, $drink_id)";
					
		mysqli_query($db, $create_ingredient_query)
		or die ("Error in create ingredient 1");
					
	}
	}
?>	
</div>

</div>
</body>
</html>