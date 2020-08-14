<?php
session_start();
$con = mysqli_connect("localhost","root","") or die(mysqli_error());
$db = mysqli_select_db($con,"easyequip") or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Easy Equip - Login</title>
    <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#city").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue2 = $(this).attr("value");
                    if(optionValue2){
                        $(".areaOption").not("." + optionValue2).hide();
                        $("." + optionValue2).show();
                    } else{
                        $(".areaOption").hide();
                    }
                });
            }).change();
        });

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
<style type="text/css">
select{
    font-size: 1rem;
    padding: 10px 10px 10px 5px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 1px solid #e4e8f0;
}

</style>
<body class="bg-white">
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="images/icons/logo_icon.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>   
        </div>
    </div>
    <!-- End Preloader -->
    <!-- Begin Container -->
    <div class="container-fluid no-padding h-100">
        <div class="row flex-row h-100 bg-white">
            <!-- Begin Left Content -->
            <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                <div class="elisyam-bg background-01">
                    <div class="elisyam-overlay overlay-01" style="background:-webkit-linear-gradient(0deg, #bfacff 0%, #795fff 100%);height: 1000px;"></div>
                    <div class="authentication-col-content mx-auto">
                         <div class="logo-centered">
                        
                            <img src="images/icons/logo_icon.png" alt="logo">
                    </div>
                        <h1 class="gradient-text-01">
                            Earn more than 80,000 per month 
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
                    <h3>Step 2 of 2</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="group material-input">
                         <input type="number" name="number" required>
                         <span class="highlight"></span>
                         <span class="bar"></span>
                         <label>CNIC</label>
                     </div>
                     <div class="group material-input">
                        <label>Preferred Location</label><br><br>
                        <select id="city" name="city" class="input100">
                            <option value="">Select City</option>
                            <?php 
                            $city_result = mysqli_query($con,"SELECT `id`, `city` FROM `tbl_city`");
                            while($city_row = mysqli_fetch_array($city_result)):;?>
                                <option  value="<?php echo $city_row[0];?>"><?php echo $city_row[1];?></option>
                            <?php endwhile; ?>
                        </select>
                        <?php 
                        $city_result1 = mysqli_query($con,"SELECT `id`, `city` FROM `tbl_city`"); 
                        while($city_row1 = mysqli_fetch_array($city_result1)):;
                            ?>
                            <div class=" <?php echo $city_row1[0];?> areaOption">
                                <select id="area" name="area" class="input100">
                                    <option value="">Select Area</option>
                                    <?php 
                                    $area_result = mysqli_query($con,"SELECT `id`, `city_id`, `area` FROM `tbl_area` WHERE `city_id` = '$city_row1[0]'");
                                    while($area_row = mysqli_fetch_array($area_result)):;
                                        $area_value = $area_row[0];?>
                                        <option  value="<?php echo $area_value ?>"><?php echo $area_row[2];?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        <?php endwhile; ?>

                    </div>
                    <div class="group material-input">
                     <input type="string" name="address" required>
                     <span class="highlight"></span>
                     <span class="bar"></span>
                     <label>Home Address</label>
                 </div>
                 <div class="group material-input">
                    <input type="string" name="shop" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Shop Address</label>
                </div>
                <div class="group material-input">
                    <p>Profession</p>
                    <select name="profession" class="input100">
                        <?php
                        $result = mysqli_query($con,"SELECT `id`, `services` FROM `tbl_profession`"); 
                        while($row = mysqli_fetch_array($result)):;?>
                            <option  value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="group material-input">
                    <p>Gender</p>
                    <select name="gender" class="input100">
                        <option  value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>



                <div class="group material-input">
                    <span class="label-input100">Profile Picture</span>
                    <input type="file" name="f1" value="f1" id="f1">
                    <span class="focus-input100"></span>
                </div>

                <div class="sign-btn text-center">
                 <input type="submit" name="submit" class="btn btn-lg btn-gradient-01" value="Become a Professional">

             </div>
             <br>
             <br>

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
if (isset($_POST['submit'])) {

    $shop = $_POST['shop'];
    $profession = $_POST['profession'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $shop_address = $_POST['shop'];
    $number = $_POST['number'];
    $area = $_POST['area'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["f1"]["name"]);
    move_uploaded_file($_FILES["f1"]["tmp_name"], $target_file);

    $sql = "SELECT id FROM tbl_worker ORDER BY id DESC LIMIT 1";
    $res =  $con->query($sql);
    
    if (!preg_match("/^[0-9]{13}+$/", $number)) 
    {
        echo "<script> alert ('CNIC number is incorrect')</script>";

    }
    else 
    {
        if ($res->num_rows > 0) 
        {
         // output data of each row
            while($row = $res->fetch_assoc()) 
            {
                $fun2 = "INSERT INTO `tbl_worker_details`(`gender`, `address`, `cnic`,  `shop_address`, 
                `status` ,`prof_id`, `img` ,`worker_id`) VALUES ('$gender', '$address' ,'$number','$shop','pending','$profession', '$target_file', '".$row['id']."')";
            }
            if(mysqli_query($con,$fun2))
            {
                $sql1 = "SELECT id FROM tbl_worker_details ORDER BY id DESC LIMIT 1";
                $res1 =  $con->query($sql1);
                if ($res1->num_rows > 0) 
                {
                 // output data of each row
                    while($row1 = $res1->fetch_assoc()) 
                    {

                        $fun3 = "INSERT INTO `tbl_available`(`worker_detail_id`, `area_id`) VALUES ('".$row1['id']."','$area')";
                        $query_result = mysqli_query($con, "INSERT INTO `tbl_available`(`worker_detail_id`, `area_id`) VALUES ('".$row1['id']."','$area')");
                    }
                    if($query_result == 1)
                    {
                        //echo "<script> alert ('SUCESSFULL' )</script>";
                        echo "<script>window.location.assign('third.php')</script>";
                    }
                    else{
                        echo "<script> alert ('Failure' )</script>";
                    }
                }
            }
        }
    }
}