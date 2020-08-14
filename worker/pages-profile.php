<?php session_start();
include("connection.php");
if(!isset($_SESSION["email"])){
   echo "<script>window.location.assign('login.php')</script>";
}else{


 ?>
 <!DOCTYPE html>

 <html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EasyEquip- Profile</title>
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
<link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="images/icons/logo_icon.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->

            <!-- End Header -->
            <!-- Begin Page Content -->
            <?php
            include('navbar.php');
            include('sidemenu.php');
            ?>
            <!-- End Left Sidebar -->
            <!-- Begin Content -->
            <div class="content-inner profile">
                <div class="container-fluid">
                    <!-- Begin Page Header-->
                    <div class="row">
                        <div class="page-header">
                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">Profile</h2>
                                <div>
                                    <ul class="breadcrumb">

                                        <li class="breadcrumb-item"><a href="logout.php">Log out</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="row flex-row">
                        <div class="col-xl-12">
                            <div class="widget has-shadow">
                                <?php
                                $con = mysqli_connect("localhost","root","") or die(mysqli_error());
                                $db = mysqli_select_db($con,"easyequip") or die(mysqli_error());


                                $p = "SELECT s.id, s.address, s.shop, s.shop_address, s.rating, c.name, c.email, c.phone_no, p.services, s.img, d.city FROM tbl_worker_details s, tbl_worker c, tbl_profession p, tbl_city d WHERE s.status = 'approve' AND s.worker_id = c.id AND email = '".$_SESSION['email']."' AND s.prof_id = p.id";
                                $result = mysqli_query($con,$p);
                                $result_row = mysqli_num_rows($result);
                                if($result_row> 0){
                                    while($abc = mysqli_fetch_array($result)) {
                                        ?>
                                        <div class="widget-body">
                                            <div class="mt-5">
                                                <img src="<?php echo  $abc['img'];  ?>" alt="..." style="width: 120px; height: 120px;" class="avatar rounded-circle d-block mx-auto">
                                            </div>


                                            <h3 class="text-center mt-3 mb-1"><?php echo $abc['name']; ?></h3>
                                            <p class="text-center"><?php echo $abc['email']; ?></p>

                                            <div class="em-separator separator-dashed"></div>
                                        </div>
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4>Profile</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="col-10 ml-auto">
                                                <div class="section-title mt-3 mb-3">
                                                    <h4>01. Personnal Informations</h4>
                                                </div>
                                            </div>
                                            <form class="form-horizontal">
                                                <div class="form-group row d-flex align-items-center mb-5">
                                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Name</label>
                                                    <div class="col-lg-6">
                                                        <?php echo $abc['name']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mb-5">
                                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                                    <div class="col-lg-6">
                                                        <?php echo $abc['email']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mb-5">
                                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>
                                                    <div class="col-lg-6">
                                                        <?php echo $abc['phone_no']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mb-5">
                                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Profession</label>
                                                    <div class="col-lg-6">
                                                        <?php echo $abc['services']; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row d-flex align-items-center mb-5">
                                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Rating</label>
                                                    <div class="col-lg-6">
                                                       <?php echo $abc['rating']; ?>
                                                   </div>
                                               </div>
                                           </form>
                                           <div class="col-10 ml-auto">
                                            <div class="section-title mt-3 mb-3">
                                                <h4>02. Address Informations</h4>
                                            </div>
                                        </div>
                                        <form class="form-horizontal">
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Address</label>
                                                <div class="col-lg-6">
                                                    <?php echo $abc['address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Shop address</label>
                                                <div class="col-lg-6">
                                                    <?php echo $abc['shop_address']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">City</label>
                                                <div class="col-lg-6">
                                                    <?php echo $abc['city']; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row d-flex align-items-center mb-5">
                                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Country</label>
                                                <div class="col-lg-6">
                                                    Pakistan
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                }
                                else{
                                    echo "Your application is in progress.";
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="em-separator separator-dashed"></div>
                                        <!-- <div class="text-right">
                                            <button class="btn btn-gradient-01" type="submit">Save Changes</button>
                                            <button class="btn btn-shadow" type="reset">Cancel</button>
                                        </div>
                                    </div> -->
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
                        <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
                        <script src="assets/vendors/js/app/app.min.js"></script>
                        <!-- End Page Vendor Js -->
                        <!-- Begin Page Snippets -->
                        <script src="assets/js/app/contact/contact.min.js"></script>
                        <!-- End Page Snippets -->
                    </body>
                    </html>
                    <?php } ?>