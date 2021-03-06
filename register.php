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
		<h1>Register</h1>
		<?php
			if(isset($_GET["error"])){
				echo "The username you selected is already taken.";
			}
			if(isset($_GET["missing"])){
				echo "Please fill out all fields.";
			}
		?>
		<form method="post" action="registerController.php">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" /><br />
			<label for="pw">Password:</label>
			<input type="password" id="pw" name="pw" /><br />
			<label for="email">E-mail:</label>
			<input type="text" id="email" name="email" /><br />
			<input type="submit" value="Register" name="submit" />
		</form>
		
		</div>
		
		
		
	</div>

</div>
</body>
</html>
