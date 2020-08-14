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
		include("backend/connection.php");
		?>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<?php include('divScript.php')?>
	</head>	
	<body>

		<?php 
		include('header.php');
		?><!-- #header -->

		<!-- start banner Area -->
		<section class="banner-area relative" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-center">
					<div class="banner-content col-lg-12">
						<div class="col-lg-12 row justify-content-center form-wrap">
							<h1 class="text-white">
								<?php	
								echo $_SESSION['name'];
								?>				
							</h1>
						</div>	
						<form action="search.php" class="serach-form-area">
							<div class="row justify-content-center form-wrap" id="check">
								<div class="col-lg-3 form-cols">
									<div class="default-select" id="default-selects"">
										<select id="city">
											<option value="">Select City</option>
											<?php 
											$city_result = mysqli_query($link,"SELECT `id`, `city` FROM `tbl_city`");
											while($city_row = mysqli_fetch_array($city_result)):;?>
												<option  value="<?php echo $city_row[0];?>"><?php echo $city_row[1];?></option>
											<?php endwhile; ?>

											<option  disabled="">Islamabad - Coming Soon</option>
											<option  disabled="">Lahore - Coming Soon</option>
											<option  disabled="">Multan - Coming Soon</option>
										</select>
									</div>
								</div>
								<?php 
								$city_result1 = mysqli_query($link,"SELECT `id`, `city` FROM `tbl_city`");
								while($city_row1 = mysqli_fetch_array($city_result1)):;?>
									<div class="col-lg-3 form-cols <?php echo $city_row1[0];?> areaOption">

										<div class="default-select" id="default-selects2">
											<select id="area">
												<option value="null">Select Area</option>
												<?php 
												$area_result = mysqli_query($link,"SELECT `id`, `city_id`, `area` FROM `tbl_area` WHERE `city_id` = '$city_row1[0]'");
												while($area_row = mysqli_fetch_array($area_result)):;
													$area_value = $area_row[0];?>
													<option  value="<?php echo $area_value ?>"><?php echo $area_row[2];?></option>
												<?php endwhile; ?>
											</select>
										</div>										
									</div>
								<?php endwhile; ?>
								<div class="col-lg-3 form-cols">
									<div class="default-select" id="default-selects2">
										<select id="profession">
											<option value="">Select Worker</option>
											<?php 
											$result = mysqli_query($link,"SELECT `id`, `services` FROM `tbl_profession`");
											while($row = mysqli_fetch_array($result)):;
												$prof_value = $row[0];?>
												<option  value="<?php echo $prof_value;?>"><?php echo $row[1];?></option>
											<?php endwhile; ?>
										</select>
									</div>										
								</div>

								<div class="col-lg-2 form-cols">
									<button type="button" class="btn btn-info" id="search">
										<span class="lnr lnr-magnifier"></span> Search
									</button>
								</div>								
							</div>
						</form>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->	

		<!-- Start features Area -->
		<section class="features-area" id="features" style="margin-top: -120px;">

			<!-- content recieved from search.php -->	
		</section>
		<!-- End features Area -->

		<!-- Start feature-cat Area -->
		<section class="feature-cat-area pt-150" id="category">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
							<h1 class="mb-10">Our Featured Services</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					</div>
				</div>						
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o1.png" alt="Plumber-image">
							</a>
							<p>Plumber</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o2.png" alt="Electrician-image">
							</a>
							<p>Electrician</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o3.png" alt="Carpenter-image">
							</a>
							<p>Carpenter</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o5.png" alt="Welder-image">
							</a>
							<p>Welder</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o4.png" alt="Painter-image">
							</a>
							<p>Painter</p>
						</div>			
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-fcat">
							<a href="services.php">
								<img src="img/o6.png" alt="Mason-image">
							</a>
							<p>Mason</p>
						</div>			
					</div>
				</div>
			</div>	
		</section>
		<!-- End feature-cat Area -->
		
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

		<!-- Start download Area -->
		<section class="download-area section-gap" id="app">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 download-left">
						<img class="img-fluid" src="img/d1.png" alt="">
					</div>
					<div class="col-lg-6 download-right">
						<h1>Download the <br>
						EasyEquip App Today!</h1>
						<p class="subs">
							It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.
						</p>
						<div class="d-flex flex-row">
							<div class="buttons">
								<i class="fa fa-apple" aria-hidden="true"></i>
								<div class="desc">
									<a href="#">
										<p>
											<span>Available</span> <br>
											on App Store
										</p>
									</a>
								</div>
							</div>
							<div class="buttons">
								<i class="fa fa-android" aria-hidden="true"></i>
								<div class="desc">
									<a href="#">
										<p>
											<span>Available</span> <br>
											on Play Store
										</p>
									</a>
								</div>
							</div>									
						</div>						
					</div>
				</div>
			</div>	
		</section>
		<!-- End download Area -->

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



