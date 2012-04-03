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
			include "db_connect.php";
			
			if(isset($_GET["drink"])){
				if(isset($_SESSION['user_id'])){
					$id = $_SESSION['user_id'];
					$drinkName = $_GET['drink'];
					$query = "SELECT drink_id FROM mix_drinks
							WHERE drink_name = '$drinkName'";
					$result = mysqli_query($db, $query) or die("Error querying database");
					if ($row = mysqli_fetch_array($result))
					{
						$drinkId = $row['drink_id'];
						$query2 = "INSERT INTO junction VALUES ('$id', '$drinkId')";
						$result2 = mysqli_query($db, $query2) or die ("Error entering into junction table.");
						mysqli_close($db);
						header('Location: profile.php');
						
					}

				}
				else{
					header('Location: login.php');
				}
				
			}
			else{
				header('Location: search.php');
			}
			?>
		
		</div>
		
	</div>

</div>
</body>
</html>
