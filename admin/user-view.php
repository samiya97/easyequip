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
        <title>Easy Equip - Users</title>
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
	                                <h2 class="page-header-title">Users View</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="db-all.html"><i class="ti ti-home"></i></a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ul>
                                    </div>	                            
                                </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                      
                      
                      
                      <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Users</h4>
                                    </div>
                                    <div class="widget-body">
                                       <div class="table-responsive"><table id="sorting-table" class="table mb-0 dataTable no-footer" role="grid" aria-describedby="sorting-table_info">
                                                <thead>
                                                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending" style="width: 76px;">ID</th>
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 120px;">Name</th>
                                                    
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 76px;">Email</th>
                                                    
                                                    
                                                    
                                                   
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Password</th>
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Cell number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Gender</th>
                                                    
                                                    
                                                    

                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 76px;">Actions</th></tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                include("connection.php");
                                  $p = mysqli_query($var,"select * from tbl_user");
                                  while($abc = mysqli_fetch_array($p))
                                  {

                                  ?>
                                                    
                                               <tr role="row" class="even">
                                                        <td><span class="text-primary"><?php echo $abc['u_id']; $idd=$abc['u_id']; ?></span></td>
                                                        <td><?php echo $abc['name']; ?></td>
                                                        <td><?php echo $abc['email']; ?></td>
                                                        <td><?php echo $abc['password']; ?></td>
                                                        <td><?php echo $abc['cellno']; ?></td>
                                                        <td><?php echo $abc['gender']; ?></td>
                                                        <td class="td-actions">
                                                           <!-- <a href='<?php// echo "user-update.php?id=$idd"; ?>'><i class="la la-edit edit"></i></a>-->
                                                            <a href='<?php echo "user-delete.php?action=delete&id=$idd";?>' onclick="return confirm('Are you sure you want to delete this?');"><i class="la la-close delete"></i></a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                    }
                                                    ?>



                                                </tbody></table></div>
                      
                      
                      
                      
                      
                      
                             
                            
                    
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

if(isset($_POST["createbtn"]))
{
include("connection.php");
$ab = "INSERT INTO tbl_package(Title, place_name, hotel_name, days, amount, food, description)
VALUES ('".$_POST['ptitle']."', '".$_POST['pplace']."', '".$_POST['photel']."', '".$_POST['pdays']."', '".$_POST['pamount']."', '".$_POST['pfood']."', '".$_POST['pdesc']."')";
     
 mysqli_query($var,$ab);

 echo $ab;


    $jf = mysqli_query($var,"Select max(id) id from tbl_package");
    if($RR = mysqli_fetch_array($jf))
    {
       move_uploaded_file($_FILES["pphotoa"]["tmp_name"],"package-images/".$RR["id"]."_(A).jpg"); 
       move_uploaded_file($_FILES["pphotob"]["tmp_name"],"package-images/".$RR["id"]."_(B).jpg");
       move_uploaded_file($_FILES["pphotoc"]["tmp_name"],"package-images/".$RR["id"]."_(C).jpg");
    }

     echo "<script>alert('Document Add Succesfully');</script>";




}

?>