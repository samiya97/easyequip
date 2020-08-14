<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login EasyEquip</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100"  style="background:-webkit-linear-gradient(0deg, #bfacff 0%, #795fff 100%);">
			<div class="wrap-login100">
			
					<center>
						<img style="width: 100px;" src="images/icons/logo_icon.png">
						</center>
					<br>
					
                            <?php
                            echo "<center>";
                             $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                              $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());

                               echo "<style= 'position: relative; left: 365px; font-size: 10px; font-family: cursive; '> Hi, <br>";
                              echo $_SESSION['email'];
                      			echo "</center>";
                            ?>
                        
	
					
                        
	<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit" >
								Next
							</button>
						</div>
					</div>
				</form>

					<div class="text-center p-t-115">
						<span class="txt1">
							Forgot Password.?
						</span>

						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>




<?php
$con = mysqli_connect("localhost","root","") or die(mysqli_error());
$db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


if (isset($_POST['submit'])) {
    
 	$worker_id = $_POST['worker_id'];
    $_SESSION['email'];
    $pass = $_POST['pass'];
   

    $slquery = "SELECT email,password FROM tbl_worker WHERE email = '".$_SESSION['email']."' && password = '".$pass."'";
    $selectresult = mysqli_query($con,$slquery);

    //if($R = mysqli_fetch_array($slquery))
    if($R = mysqli_num_rows($selectresult) > 0) 
    {
        //echo "<script> alert ('Sucessfull')</script>";
        session_start();
    	$_SESSION['user']= $R['id'];
    	//$_SESSION['email'];
        echo "<script> window.location = 'pages-profile.php'; </script>";
    }

    elseif (mysqli_num_rows($selectresult) == 0)
    {
        echo "<script> alert ('The Password you entered is incorrect') </script>";                         
    }

}



?>

