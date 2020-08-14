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
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="home.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about-us.php"> About Us</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start service Area -->
			<section class="service-area section-gap" id="service">
				<div class="container">
					<div class="row zoomIn d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Why Choose Us</h1>
							<p>
								EasyEquip is not new but revolutionary! Every house in Pakistan is facing these problems since ages and 
								for solution we only rely on people who might or might not be credible for the job. We decided to stop 
								this once and for all. We came up with EasyEquip to provide a platform for Pakistanis to hire reliable, 
								affordable technicians who know how to get the job done on time and keep the work to a satisfactory mark. 
								The mission of EasyEquip is to provide reliable and penny saving solutions to the problem we are facing 
								almost every day in some form. We have the team of professionals we can get the odd job done on time. 
								Just Book an appointment online book one of our reliable staff today!
							</p>
						</div>
					</div>
					<hr><br><br><br>
					<div class="row">
						<div class="col-sm-4 text-center animated zoomIn">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Our Vision</h4>
								<p>
									We at EasyEquip work with the vision to provide the most effective, reliable and yet 
									affordable solution to the problems we face every day.
								</p>
							</div>
						</div>
						<div class="col-sm-4 text-center animated zoomIn">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Our Mission</h4>
								<p>
									Our mission is to bring revolution to current service model and hire the reliable staff 
									for your odd jobs on a single click with no hassle
								</p>
							</div>
						</div>
						<div class="col-sm-4 text-center animated zoomIn">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Our Values</h4>
								<p>
									At EasyEquip we value customer satisfaction & daily basis needs. We ideally want people to fix their service man without any hassle.
								</p>
							</div>
						</div>
					</div><br><br>
					<hr><br><br><br>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Plumber</h4>
								<p>
									We deal in almost all kind of plumbing work which includes PPR Fittings, CPVC Fitting and similar. 
									Be it a major contract or a minor repair work, just give us a call and get your plumbing worries fixed,
									once and for all.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Electrician</h4>
								<p>
									From a ceiling fan installation to a commercial wiring for your now home and office we do it all. 
									We have electricians who can get the job done with pure satisfaction. Book us and leave it on us
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Painter</h4>
								<p>
									Bored of seeing the same paint every day? Get a new coat and make your walls look attractive. 
									We provide with superior paint services to make your walls look good. May it be your office or home; 
									we guarantee quality service to you.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Carpenter</h4>
								<p>
									Do you have to get a modular kitchen customized? Or do you plan to change the cloth for your sofa? 
									Or do you want to get some those paintings up on the wall? EasyFix is a one call solution partner for all your needs.
								</p>				
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>AC & Refrigerator<h5>Coming Soon!</h5><br></h4>
								<p>
									AC & Refrigerators is a common problem in the country these days. We are specialized in repairing your AC and refrigerators. 
									Just call us to give us a try and we promise to deliver quality and satisfaction
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-service">
								<h4><span class="lnr lnr-user"></span>Generator<h5>Coming Soon!</h5><br></h4>
								<p>
									We are fully aware that your product depends on power supply, and generators can provide you best power back up during 
									the shortage of your power supply. For this purpose the Generators need quality maintenance & repair.
								</p>									
							</div>
						</div>						
					</div><br><br><hr><br><br><br>
					<div class="row zoomIn d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Find Us</h1><br><h3>Our Corporate Office</h3><br><br><br>
							<address>
								<p>	
									<i class="fa fa-map-marker">
									</i>
									"Address: abc"
								</p>
								<p>	
									<i class="fa fa-phone">
									</i>
									"Phone: 021-34825791"
								</p>
							</address>
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

