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
        <title>Easy Equip - Worker Updation</title>
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
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
	                                <h2 class="page-header-title">Update Worker</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                                         
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
                                        <h4>Worker Detail Updation</h4>
                                    </div>
                                    <div class="widget-body">
                                         <?php
                               include("connection.php");
                                
                               $id1=$_GET['id'];

                                                              
                                 // $p = mysqli_query($var,"Select * from tbl_worker_details where id = '$id1'");
                                   $p = mysqli_query($var,"Select s.id ,s.gender, s.address,s.contact_no,s.shop , s.shop_address , c.name ,c.email, p.services from tbl_worker_details s , tbl_worker c , tbl_profession p where s.id = '$id1' and s.worker_id = c.id and s.prof_id = p.id ");
                                  if($xyz = mysqli_fetch_array($p))
                                  {
                                    ?>
                       <form class="needs-validation" enctype="multipart/form-data" method="POST">

                                            <div class="form-group row d-flex align-items-center mb-3">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ID</label>
                                                <div class="col-lg-5">
                                                   <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><?php echo $xyz['id']; $id=$xyz['id']; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group row d-flex align-items-center mb-3">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Name</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wname" required="" value="<?php echo $xyz['name']; ?>" placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wemail" required="" value="<?php echo $xyz['email']; ?>" placeholder="Enter Email">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Profession</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wprof" required="" value="<?php echo $xyz['services']; ?>" placeholder="Enter your profession">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Address</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="waddress" required="" value="<?php echo $xyz['address']; ?>" placeholder="Enter your address">
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contact</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wcontact" required="" value="<?php echo $xyz['contact_no']; ?>" placeholder="Enter your contact number">
                                                </div>
                                            </div>

                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Shop</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wshop" required="" value="<?php echo $xyz['shop']; ?>" placeholder="Enter your contact number">
                                                </div>
                                            </div>

                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Shop Address</label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="wshopadd" required="" value="<?php echo $xyz['shop_address']; ?>" placeholder="Enter your contact number">
                                                </div>
                                            </div>

                                           <div class="text-right">
                                                <input type="submit" class="btn btn-gradient-01" value="Submit Form"  name="updatedata"/> 
                                                <button class="btn btn-shadow" type="reset">Reset</button>
                                            </div>
                                              </form>
                                            <?php 
                                        }
                                   
                                             ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                    
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                
                    <!-- End Offcanvas Sidebar -->
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

if(isset($_POST["updatedata"]))
{
include("connection.php");
////not easyyyyy
mysqli_query($var,"UPDATE tbl_worker_details,tbl_worker,tbl_profession SET name='".$_POST['wname']."', email='".$_POST['wemail']."', services='".$_POST['wprof']."', days='".$_POST['pdays']."' , food = '".$_POST['pfood']."', description = '".$_POST['pdesc']."' WHERE id = '".$id."'");

 echo"<script>alert('Package Updated Succesfully');</script>";
echo"<script>window.location.assign('package-view.php')</script>";
echo "<meta http-equiv='refresh' content='0'>";

}



?>