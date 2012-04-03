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

<h1>Add A Drink!</h1>
<form enctype="multipart/form-data" method="post" action="AddIngredient.php">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    
	<label for="drink_name">Drink Name:</label>
    <input type="text" id="drink_name" name="drink_name" value="<?php if (!empty($drink_name)) echo $drink_name; ?>" /><br />
	
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
	
    </br></br><input type="submit" value="Next" name="submit"  />
	
</div>

</div>
</body>
</html>
