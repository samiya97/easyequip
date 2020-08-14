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
							Services				
						</h1>	
						<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="services.php"> Services</a></p>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->	

		<!-- Start service Area -->
		<section class="service-area section-gap" id="service">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						
					</div>
				</div>
				
				<div class="row">
					<a href="plumber.php">
						<div class="col-lg-4 col-md-6">

							<div class="single-service">

								<h4> Plumber</h4>
								<img src="img/o1.png" alt="Plumber-image">
							</a>     
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<a href="electrician.php">
								<h4> Electrician</h4>
								<p>
									<img src="img/o2.png" alt="Electrician-image">
								</p>								

							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<a href="carpenter.php">								
								<h4> Carpenter</h4>
								<p>
									<img src="img/o3.png" alt="Carpenter-imaage">
								</p>								

							</a>		
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="single-service">

							<a href="painter.php">			
								<h4> Painter</h4>
								<p>
								<img src="img/o4.png" alt="Painter-image">
								</p>
							</a>				
						</div>
					</div>

				</div>	
			</div>
		</div>	
	</section>
	<!-- End service Area -->						


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

