<?php
session_start();
$page = $_SERVER["PHP_SELF"]

?>
<div id="header">
		<div id="site-name">Drink Recipes</div>
		<div id="search">
		<?php
			if(isset($_SESSION['user_id'])){
				$username = $_SESSION['user_name'];
				echo "Welcome, $username!</br>";
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
					echo "Your points: <font size=5em>".$points."</font></br>";
				}
			}
		?>
		</div>
		<ul id="nav">
		<li <?php if($page=="/DrinkRecipes/index.php"){echo"class=\"active\"";}?>><a href="index.php">Home</a>
		</li>
		<li <?php if($page=="/DrinkRecipes/about.php"){echo"class=\"active\"";}?>><a href="about.php">About Us</a>
		</li>
		<?php
			include('CookieCheck.php');
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
	
