<?php session_start();
include("connection.php");
if(!isset($_SESSION["user"])){
   echo "<script>window.location.assign('index.php')</script>";
  }else{


 ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Easy Equip - Add Services</title>
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
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="images/icon.ico" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
        <?php
		include('navbar.php');
		include('sidemenu.php');
        
		?>
           <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Add Services</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="db-all.html"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item active">Blank</li>
                                        </ul>
                                    </div>	                            
                                </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Begin Row -->
                        <div class="row flex-row">
                            <div class="col-xl-12 col-12">
                               <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Add Services</h4>
                                    </div>
                                    <div class="widget-body">
                                        <form class="needs-validation"  enctype="multipart/form-data" method="POST">
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Profession</label>
                                                <div class="col-lg-5">
                                                    <div class="select">
                                                        <select name="profid" class="custom-select form-control" required="">
                                                            <option value="">Select a Profession</option>
                                                           <?php
                                include("connection.php");
                                  $p = mysqli_query($var,"Select * from tbl_profession");
                                  while($abc = mysqli_fetch_array($p))
                                  {

                                    echo "<option value='".$abc["id"]."'>".$abc["services"]."</option>";
                                  }

                                  ?>
                                                           
                                                        </select>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Service type </label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="stype" class="form-control" placeholder="add a service type">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Price</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="sprice" class="form-control" placeholder="Add price for the serives">
                                                </div>
                                            </div>
                                            
                                           <div class="text-right">
                                                <input type="submit" class="btn btn-gradient-01" value="Submit Form"  name="addbtn"/> 

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
  
        
        
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        
       
        <!-- End Page Vendor Js -->
    </body>
</html>
<?php } ?>


<?php

if(isset($_POST["addbtn"]))
{
include("connection.php");
$ab = "INSERT INTO tbl_jobtype(prof_id, job_type, price)
VALUES ('".$_POST['profid']."', '".$_POST['stype']."', '".$_POST['sprice']."')";
     
 mysqli_query($var,$ab);
 echo "<script>alert('Add Servies Succesfully');</script>";




}

?>