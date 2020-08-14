<?php session_start();
include("connection.php");
if(!isset($_SESSION["id"])){
   echo "<script>window.location.assign('login(customer).php')</script>";
  }else{


 ?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<?php 
		include('head.php');
		?>
	</head>
	<body>

		<?php 
		include('header.php');
		?><!-- #header -->


		<!-- start banner Area -->
		<section class="banner-area relative" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Worker Profile				
						</h1>	
						<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="#"> Worker Profile</a></p>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->	

		<!-- Start post Area -->
		<section class="post-area " style="padding: 50px 0px;">
			<div class="container">
				<div class="row justify-content-center d-flex">
					<div class="col-lg-8 post-list">
						<?php include("search-profile.php"); ?>
					</div>
				</div>
			</div>	
		</section>
		<!-- End post Area -->

		<!-- Start callto-action Area -->
		<section class="callto-action-area section-gap">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content col-lg-9">
						<div class="title text-center">
							<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
							<p class="text-white">You will get job by just one click, the simplest way Of earning and become a professional. No office, No boss. </p>
							<a class="primary-btn" href="#">Join Our Team</a>
						</div>
					</div>
				</div>	
			</div>	
		</section>
		<!-- End calto-action Area -->			

		<!-- start footer Area -->		
		<?php 
		include('footer.php');
		?>
		<!-- End footer Area -->		
		<?php 
		include('script.php');
		?>	
	</body>
	</html>
<?php } ?>



