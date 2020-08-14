<?php
include('backend/connection.php');  

$user_id = $_SESSION['id'];
$worker_id = $_POST['worker_id'];
$address = $_POST['address'];
$total = 0;

foreach ($_POST['job_type'] as $value1) {
	$slct = mysqli_query($link,"SELECT  `price` FROM `tbl_jobtype` WHERE `id` = '$value1'");
	$record = mysqli_fetch_array($slct,MYSQLI_BOTH);
	$total += $record['price'];
}
$qry = mysqli_query($link,"INSERT INTO `tbl_order`(`user_id`, `worker_id`, `customer_address`, `amount`, `status`) VALUES ('$user_id','$worker_id','$address','$total','pending')");

if ($qry == 1){
	$slct1 = mysqli_query($link,"SELECT id FROM tbl_order ORDER BY id DESC LIMIT 1");
	$record1 = mysqli_fetch_array($slct1,MYSQLI_BOTH);
	$order_id = $record1['id'];

	foreach ($_POST['job_type'] as $value1) {
		$qry1 = mysqli_query($link,"INSERT INTO `tbl_order_details`( `order_id`, `job_type_id`) VALUES ('$order_id','$value1')");
	}
	echo "Order request proceed...";
}
else {
	echo "Some error occured!";
}
// header ("Refresh: 3; url = user-acc.php");

?>