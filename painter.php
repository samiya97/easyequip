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
		include('connection.php');
		?>
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
							Painters				
						</h1>	
						<p class="text-white link-nav"><a href="services.php">Services </a>  <span class="lnr lnr-arrow-right"></span>  <a href="painter.php"> Painter</a></p>
					</div>											
				</div>
			</div>
		</section>
		<!-- End banner Area -->	
		
		<?php
		require "conn.php";
		$customer_history = array();
		$mysqli_qry="SELECT * FROM ((`tbl_worker` INNER JOIN `tbl_worker_details` on `tbl_worker`.`id` = `tbl_worker_details`.`worker_id`) INNER JOIN `tbl_profession` ON `tbl_worker_details`.`prof_id` = `tbl_profession`.`id`) WHERE `tbl_profession`.`services` = 'Painter'";
		$result= mysqli_query($conn,$mysqli_qry);
		if(mysqli_num_rows($result) > 0){

			while($row = $result->fetch_assoc()) {
				$history  = array();
				$history["id"] = $row["id"];
				$history["name"] = $row["name"];
				$history["email"] = $row["email"];
				$history["gender"] = $row["gender"];
				$history["services"] = $row["services"];

				array_push($customer_history, $history); 
			}
			echo "<br>";
			echo "<b>"."\n",'<div style="font-size:3.25em;color:black">Available Painters</div>'."</b>";
			foreach ( $customer_history as $var )  {
				echo "<br>";
				echo "\n".'<span style="font-size: 20pt;color:blue">' , $var['name'].'</span>';

			}
			

		}
		else{
			echo "No Result Found";
		}



		$conn->close();
		?>				


		
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
	
	

	<?php 
	include('script.php');
	?>
</body>
</html>

<?php } ?>

