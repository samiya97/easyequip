

   <?php

   if($_GET['action'] == 'update'){
   $con = mysqli_connect("localhost","root","") or die();
   $db = mysqli_select_db($con,"easyequip") or die();

$id1=$_GET['id'];  


mysqli_query($con, "update  tbl_order set `status`= 'approve' where  id ='$id1' ");



echo "<script>alert('This work allocated')</script>";
echo"<script>window.location.assign('order-view.php')</script>";
echo "<meta http-equiv='refresh' content='0'>";

}

else{
	echo "<script>alert('UnSuccessfully taken')</script>";

}

?>
 

