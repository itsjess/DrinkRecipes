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
  include "db_connect.php";
  session_start();
  if (!isset($_SESSION['user_id'])){
	  if (!empty($_POST['username'])){	
		  $name = $_POST['username'];
		  $pw = $_POST['pw'];

		  $query = "select * from users WHERE user_name = '$name' AND password = SHA('$pw')";
		  $result = mysqli_query($db, $query);
		  if ($row = mysqli_fetch_array($result))
		   {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_name'] = $row['user_name'];
				echo "<p>Thanks for logging in, $name</p>\n";
				echo "<p><a href=\"search.php\">Continue</a></p>";
		   }
		   else
		   {
				echo "<p>Incorrect username or password</p>\n";
		   }
		  }
		  else
		   {
				echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
				echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
				echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
				echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"register.php\">Create Account</a></p>";
				
		   }
	}
	else
	{
		$username = $_SESSION['user_name'];
		echo '<p> ' . $username . ' are already loggend in.</p>';	
		echo '<a href="logout.php">logout</a>';
	}
?>

<div id="wrap">

	
	
	<div id="content-wrap">
		<div id="content">
		<h1></h1>
		
		
		</div>
		
		
		
	</div>

</div>
</body>
</html>
