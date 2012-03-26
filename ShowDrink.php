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
	// Confirm success with the user
	$username = $_SESSION['user_name'];
	$drink_name = $_SESSION['drink_name'];
	$screenshot = $_SESSION['screenshot'];
	echo ':<p>Thanks ' . $username . ' for adding a drink! It will be reviewed and added to the drink list as soon as possible.</p>';
	echo '<p><strong>Drink Name:</strong> ' . $drink_name . '<br />';
	echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
	echo '<p><a href="browse.php">&lt;&lt; Back to browse page</a></p>';
?>

</div>

</div>
</body>
</html>