<!DOCTYPE html>
<?php session_start();
include("connection.php");
if(isset($_SESSION["id"])){
	echo "<script>window.location.assign('home.php')</script>";
}else{

require_once 'config.php';
?>
<html lang="en">
<head>
	<title>EasyEquip</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/index_util.css">
	<link rel="stylesheet" type="text/css" href="css/index_main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-img1 size1 overlay1" style="background-image: url('img/bg01.jpg');">
		<div class="size1 p-l-15 p-r-15 p-t-30 p-b-50">
			<div class="flex-w flex-sb-m p-l-75 p-r-60 p-b-50 respon1">
				<div class="wrappic1 m-r-30 m-t-10 m-b-10">
					<a href="#"><img src="img/logo.png" alt="LOGO"></a>
				</div>

				<div class="flex-w m-t-10 m-b-10">
					<a class="login100-form-btn m-r-5 m-b-3 m-t-3" href="worker/index.php">Sign Up Worker</a>
					<a class="login100-form-btn m-r-5 m-b-3 m-t-3" href="register(customer).php">Sign Up</a>
					<a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
						<i class="fa fa-twitter"></i>
					</a>

					<a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
						<i class="fa fa-youtube-play"></i>
					</a>
				</div>
			</div>

			<div class="wsize1 m-lr-auto">
				<p class="txt-center l1-txt1 p-b-30">
					Want to <span class="l1-txt2">Repair</span> it <span class="l1-txt2">NOW</span>? Login, and repair it in minutes!
				</p>

				<form class="w-full flex-w flex-c-m validate-form">

					<a class="flex-c-m size3 m1-txt2 how-btn1 trans-04 m-b-20 m-r-10" href="<?php echo htmlspecialchars($loginUrl) ?>">Login with&nbsp;&nbsp;<i class="fa fa-facebook-official p-r-5" style="font-size:30px;color:#1648b3"></i></a>	
					<p style="color: #fff;">or</p>		
					<a class="flex-c-m size3 extra m1-txt2 how-btn1 trans-04 m-b-20 m-l-10" href="login(customer).php">Sign in with your Account</a>	
				</form>
				
				<p class="txt-center s1-txt2 p-t-5">
					We provide trusted and beneficial services, to solve your problem.
				</p>
			</div>


			<div class="flex-w flex-c-m cd100  m-lr-auto p-t-40">
				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o2.png" alt="Electrician-image">
					<span class="s1-txt2">Electrician</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o1.png" alt="Plumber-image">
					<span class="s1-txt2">Plumber</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o5.png" alt="Welder-image">
					<span class="s1-txt2">Welder</span>
				</div>
				
				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o3.png" alt="Carpenter-image">
					<span class="s1-txt2">Carpenter</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o6.png" alt="Mason-image">
					<span class="s1-txt2">Mason</span>
				</div>

				<div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
					<img src="img/o4.png" alt="Painter-image">
					<span class="s1-txt2">Painter</span>
				</div>
			</div>
		</div>
	</div>



	

	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/index_main.js"></script>

</body>
</html>
<?php } ?>