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
        <title>Easy Equip - Services Update</title>
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
	                                <h2 class="page-header-title">Services Update</h2>
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
                                        <h4>Services Update</h4>
                                    </div>
                                    <div class="widget-body">
                                        <?php
                               include("connection.php");
                                
                               $id1=$_GET['id'];
                                  $p = mysqli_query($var,"select c.id, c.prof_id, c.job_type, c.price, s.services
 from tbl_profession s, tbl_jobtype c
 where c.id = '$id1' and c.prof_id = s.id");
                                  if($xyz = mysqli_fetch_array($p))
                                  {
                                    ?>
                                        <form class="needs-validation"  enctype="multipart/form-data" method="POST">
                                             <div class="form-group row d-flex align-items-center mb-3">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">ID</label>
                                                <div class="col-lg-5">
                                                   <label class="col-lg-4 form-control-label d-flex justify-content-lg-end"><?php echo $xyz['id']; $id=$xyz['id']; ?></label>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Profession</label>
                                                <div class="col-lg-5">
                                                    <div class="select">
                                                        <select name="profid" class="custom-select form-control" required="">
                                                           
                                                            <option value="">Select a profession</option>
                                                           <?php
                                
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
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Job Type</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="jobtype" class="form-control" placeholder="MM/DD/YYYY" value="<?php echo $xyz['job_type']; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Price</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="price" class="form-control" placeholder="MM/DD/YYYY" value="<?php echo $xyz['price']; ?>">
                                                </div>
                                            </div>
                                            

                                
                                            
                                           <div class="text-right">
                                                <input type="submit" class="btn btn-gradient-01" value="Submit Form"  name="updatebtn"/> 

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

if(isset($_POST["updatebtn"]))
{
include("connection.php");     
mysqli_query($var,"UPDATE tbl_jobtype SET prof_id='".$_POST['profid']."', job_type='".$_POST['jobtype']."', price='".$_POST['price']."' WHERE id = '".$id."'");

 echo"<script>alert('Services Updated Succesfully');</script>";
echo"<script>window.location.assign('jobtype-view.php')</script>";
echo "<meta http-equiv='refresh' content='0'>";
}

?>