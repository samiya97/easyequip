<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Easy Equip - Sign in</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        

    </head>
    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
         <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01" style="background:-webkit-linear-gradient(0deg, #bfacff 0%, #795fff 100%);height: 770px;"></div>
                        <div class="authentication-col-content mx-auto">
                             <div class="logo-centered">
                                <img src="images/icons/logo_icon.png" alt="logo">
                        </div>
                            <h1 class="gradient-text-01">
                                Login & become a professional.<br> Make good money No office, No boss
                            </h1>
                                                    </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="db-default.html">
                                <img src="images/icons/logo_icon.png" alt="logo">
                            </a>
                        </div>
                        <h3>Login To Your Account</h3>
                 <form method="POST">
                            
                            <div  class="group material-input">
                                <input type="Email" name="email" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                             
                            
                        
                        <div class="sign-btn text-center">
                           <input  type="submit" name="submit" class="btn btn-lg btn-gradient-01" value="Next"  >
                           
                        </div>
                        </form>
                        
                    </div>

                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>

<?php
$con = mysqli_connect("localhost","root","") or die(mysqli_error());
$db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


if (isset($_POST['submit'])) {
  
    $email = $_POST['email'];
    $_SESSION['email'] = $_POST['email'];
    
    //$pass = $_POST['pass'];
   

    $slquery = "SELECT email FROM tbl_worker WHERE email = '".$email."' ";
    $selectresult = mysqli_query($con,$slquery);

    if(mysqli_num_rows($selectresult) > 0) 
    {
        //echo "<script> alert ('Sucessfull')</script>";
        echo "<script> window.location = 'loginpwd.php'; </script>";
    }

    elseif (mysqli_num_rows($selectresult) == 0)
    {
       echo "<p style='color:red; position:relative; bottom:110px; left: 400px'>Couldn't find your EasyEquip Account</p>";                                     
    }

}



?>