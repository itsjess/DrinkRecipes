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
		
		<?php
					if ($_POST['username'] <> "" && $_POST['pw'] <> "" && $_POST['email'] <> ""){
						
					
					include('db_connect.php');
					
					$username = $_POST['username'];
					$pw = $_POST['pw'];
					$email = $_POST['email'];
					
					$checkExistsQuery = "SELECT COUNT(*) AS total FROM users WHERE user_name = '$username'";
					$existsResult = mysqli_query($db, $checkExistsQuery) or die("Could not check if user already exists.");
					
					if($row = mysqli_fetch_array($existsResult))
					{
						if ($row['total'] > 0)
						{
							#user already exists, so redirect back to register.php to display error message
							header('Location: register.php?error=true');
						}
						else
						{
							#insert user information into db
							$query = "INSERT INTO users VALUES (0, '$username', SHA('$pw'), '$email')";
							$result = mysqli_query($db, $query) or die("Error querying database");
						}
						
					}
					mysqli_close($db);
					
					header('Location: login.php');
					}
					else{
						header('Location: register.php?missing=true');
					}
					
		?>
		
		</div>
		
		
		
	</div>

</div>
</body>
</html>