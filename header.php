<?php
session_start();
$page = $_SERVER["PHP_SELF"]
?>
<div id="header">
		<div id="site-name">Drink Recipes</div>
		<div id="search">
		</div>
		<ul id="nav">
		<li <?php if($page=="/DrinkRecipes/index.php"){echo"class=\"active\"";}?>><a href="index.php">Home</a>
		</li>
		<li <?php if($page=="/DrinkRecipes/about.php"){echo"class=\"active\"";}?>><a href="about.php">About Us</a>
		</li>
		<?php
			if (isset($_SESSION['user_id'])&& !($page=="/DrinkRecipes/logout.php")){
				if($page=="/DrinkRecipes/profile.php"){echo "<li class=\"active\"><a href=\"profile.php\">Profile</a></li>";}
				else{echo "<li><a href=\"profile.php\">Profile</a></li>";}
				echo "<li><a href=\"logout.php\">Logout</a></li>";
			}
			else{
			if($page=="/DrinkRecipes/register.php"){echo "<li class=\"active\"><a href=\"register.php\">Register</a></li>";}
				else{echo "<li><a href=\"register.php\">Register</a></li>";}
			if($page=="/DrinkRecipes/login.php"){echo "<li class=\"active\"><a href=\"login.php\">Login</a></li>";}
			else{echo "<li><a href=\"login.php\">Login</a></li>";}
			
			}
		?>
		<li <?php if($page=="/DrinkRecipes/search.php"){echo"class=\"active\"";}?>><a href="search.php">Search</a>
		</li>
		<li <?php if($page=="/DrinkRecipes/browse.php"){echo"class=\"active\"";}?>><a href="browse.php">Browse</a>
		</li>
		<li <?php if($page=="/DrinkRecipes/AddDrink.php"){echo"class=\"active\"";}?>><a href="AddDrink.php">Add a Drink</a>
		</ul>
	</div>
	