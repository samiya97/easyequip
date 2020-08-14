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
        <title>Easy Equip - Worker View</title>
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
	                                <h2 class="page-header-title">Worker View</h2>
                                    <div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
                              
                                        </ul>
                                    </div>	                            
                                </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                      
                      
                      
                      <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Workers</h4>
                                    </div>
                                    <div class="widget-body">
                                       <div class="table-responsive"><table id="sorting-table" class="table mb-0 dataTable no-footer" role="grid" aria-describedby="sorting-table_info">
                                                <thead>
                                                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending" style="width: 76px;">ID</th>
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 76px;">Name</th>
                                                    
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 76px;">Email</th>
                                                    
                                                    
                                                    
                                                   
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Profession</th>
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Address</th>
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Contact</th>
                                                    
                                                   <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Shop </th>

                                                    
                                                     <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Shop Address</th>

                                                     <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Rating</th>
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 76px;">Actions</th></tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                include("connection.php");
                                  
                                  $p = mysqli_query($var,"Select s.id , s.address,c.phone_no,s.shop , s.shop_address,s.rating , c.name ,c.email, p.services from tbl_worker_details s , tbl_worker c  , tbl_profession p where status = 'approve' and s.worker_id = c.id and s.prof_id = p.id ");

                                  while($abc = mysqli_fetch_array($p))
                                  {
                                  ?>
                                                    
                                               <tr role="row" class="even">
                                                        <td><span class="text-primary"><?php echo $abc['id'];  $idd=$abc['id'];  ?></span></td>
                                                        <td><?php echo $abc['name']; ?></td>
                                                        <td><?php echo $abc['email']; ?></td>
                                                        <td class="sorting_1"><?php echo $abc['services']; ?></td>
                                                        <td><?php echo $abc['address']; ?></td>
                                                        <td><?php echo $abc['phone_no']; ?></td>
                                                        <td><?php echo $abc['shop']; ?></td>
                                                        <td><?php echo $abc['shop_address']; ?></td>
                                                        <td><i class="la la-star"></i> <?php echo $abc['rating']; ?>/5</td>
                                                

                                                         <td class="td-actions">
                                                            <form method="POST"><input type="submit"  name="block" class="btn btn-danger mr-1 mb-2" value="Block">
                                                          </form>

                                                        
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

         <!-- Begin Large Modal -->
       
        <!-- End Large Modal -->

        
                
        

        
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

if(isset($_POST["block"]))
{
include("connection.php");

$ab = "Update tbl_worker_details set status='pending' WHERE id ='$idd' ";
     
 mysqli_query($var,$ab);

 echo"<script>alert('block request succesfully');</script>";
  echo"<meta http-equiv='refresh' content='0'>";

}


?>



