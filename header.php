
<div id="header">
		<div id="site-name">Drink Recipes</div>
		<div id="search">
		</div>
		<ul id="nav">
		<li class="active"><a href="index.php">Home</a>
		</li>
		<li><a href="about.php">About Us</a>
		</li>
		<?php
			session_start();
			if (isset($_SESSION['user_id'])){
				echo "<li><a href=\"logout.php\">Logout</a></li>";
			}
			else{
			echo "<li><a href=\"register.php\">Register</a></li>
				<li><a href=\"login.php\">Login</a>
				</li>";
			}
		?>
		<li><a href="search.php">Search</a>
		</li>
		<li><a href="browse.php">Browse</a>
		</li>
		<li><a href="AddDrink.php">Add a Drink</a>
		</ul>
	</div>
