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
        <title>Easy Equip - Order View</title>
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
                <img src="images/icons/logo_icon.png" alt="logo" class="loader-logo">
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
	                                <h2 class="page-header-title">Orders Request</h2>
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
                                        <h4>Orders</h4>
                                    </div>
                                    <div class="widget-body">
                                       <div class="table-responsive"><table id="sorting-table" class="table mb-0 dataTable no-footer" role="grid" aria-describedby="sorting-table_info">
                                                <thead>
                                                    <!-- <tr role="row"><th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending" style="width: 76px;">ID</th> -->
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 76px;">ID</th>
                                                    

                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Customer Name: activate to sort column ascending" style="width: 76px;">Customer Name</th>
                                                    
                                                    
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 76px;">Address</th>
                                                    
                                                    
                                                    
                                                   
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Worker Name</th>
                                                    
                                                    
                                                   
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Amount</th>
                                                    
                                                   
                                                     <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Date</th>

                                                     <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Order Total: activate to sort column ascending" style="width: 76px;">Status</th>
                                                    
                                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 76px;">Actions</th></tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                               $con = mysqli_connect("localhost","root","") or die();
                               $db = mysqli_select_db($con,"easyequip");
                                 // $p = mysqli_query($var,"Select * from tbl_package");
                               
                                    $sql = "SELECT o.id, u.u_id, o.customer_address, w.name, o.amount, o.date, o.status FROM tbl_order o, tbl_worker w, tbl_user u  where  w.id = o.worker_id AND w.email='".$_SESSION['email']."'  AND u.u_id=o.user_id and o.status= 'pending'"; 
                                                        $record = mysqli_query($con,$sql) or die(mysqli_error());
                                                        if($R = mysqli_num_rows($record) > 0) 
                                                        {
                                                           while ($abc=mysqli_fetch_array($record)) { ?>
                                                    
                                               <tr role="row" class="even">
                                                        
                                                        <td><?php echo $abc['id']; $idd=$abc['id']; ?></td>
                                                        <td><?php echo $abc['u_id'];  ?></td> 
                                                        <td><?php echo $abc['customer_address']; ?></td>
                                                        <td ><?php echo $abc['name']; ?></td>
                                                        <td><?php echo $abc['amount']; ?></td>
                                                        <td><?php echo $abc['date']; ?></td>
                                                        <td><?php echo $abc['status']; ?></td>

                                                         <td class="td-actions">
                                                            
                                                            <a href='<?php echo "order-delete.php?action=delete&id=$idd";?>'><i class="la la-close delete" onclick="return confirm('Are you sure you want to delete this?');"></i></a>

                                                             <a href='<?php echo "order-update.php?action=update&id=$idd";?>'><input  type="submit" class="btn btn-lg btn-gradient-01" value="Take it" onclick="return confirm('Are you sure want to take this bid.?');"></i></a>
                                                        </td>
                                                         
                                                        
                                                    </tr>

                                                   

                                                <?php
                                                    }
                                                }
          ?>    



                                                </tbody></table></div>
                      

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

