

   <?php

   if($_GET['action'] == 'delete'){
       include("connection.php");               
       $id1=$_GET['id'];                                                              

mysqli_query($var,"delete from tbl_contact where id ='$id1'");

echo "<script>alert('Successfully deleted')</script>";
echo"<script>window.location.assign('feedback-view.php')</script>";
echo "<meta http-equiv='refresh' content='0'>";

}
  ?>
 

