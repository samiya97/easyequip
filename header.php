<?php include('backend/connection.php'); ?>
<header id="header" id="home">
	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="home.php"><img src="img/logo.png" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="home.php">Home</a></li>
					<li><a href="about-us.php">About Us</a></li>
					<li><a href="services.php">Our Services</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li class="menu-has-children"><a style="color: #fff; cursor: default;"><?php 
					echo $_SESSION['name']; ?></a>
						<ul>
							<li><a href="user-acc.php.php">Settings</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>	          				          
				</ul>
			</nav><!-- #nav-menu-container -->		    		
		</div>
	</div>
</header><!-- #header -->