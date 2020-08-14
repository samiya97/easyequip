

   <?php
 

   if($_GET['action'] == 'delete'){
   $con = mysqli_connect("localhost","root","") or die();
   $db = mysqli_select_db($con,"easyequip");

$id1=$_GET['id'];  
                                                           

//mysqli_query($con,"Delete from tbl_order where id ='$id1'");

mysqli_query($con, "delete from tbl_order_details where order_id ='$id1' ");
mysqli_query($con, "delete from tbl_order where id = '$id1'");



echo "<script>alert('Successfully deleted')</script>";
echo"<script>window.location.assign('order-view.php')</script>";
echo "<meta http-equiv='refresh' content='0'>";

}

else{
	echo "<script>alert('UnSuccessfully deleted')</script>";

}

?>
 

