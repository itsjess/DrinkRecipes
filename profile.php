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
   if (!isset($_SESSION['user_id'])){
	header('Location: login.php');
   }
?>
<div id="wrap">
	
	<div id="content-wrap">
	
		<div id="content">
			<?php
			$username = $_SESSION['user_name'];
			echo "<h2>Welcome to your profile, ".$username."!</h2>\n";
			
			include "db_connect.php";
			$query = "SELECT junction.user_id, SUM(points) AS Points
				FROM junction
				JOIN users ON users.user_id = junction.user_id
				JOIN mix_drinks ON mix_drinks.drink_id = junction.drink_id
				JOIN difficulty ON mix_drinks.difficulty_id = difficulty.difficulty_id
				WHERE user_name = '$username';
				";
			$result = mysqli_query($db, $query);
			if ($row = mysqli_fetch_array($result))
			{
				$points = $row['Points'];
				if(is_null($points)){
					$points = 0;
				}
				echo "You have earned ".$points." points so far.\n";
			}
			?>
			
		
		</div>
		
	</div>

</div>
</body>
</html>