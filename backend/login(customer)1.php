<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
include("connection.php");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$qry = mysqli_query($link,"SELECT * FROM `tbl_user` WHERE `u_id` = '$username' and `password` = '$password'") or die ("Cant select data from Database".mysql_error());
$record = mysqli_fetch_array($qry,MYSQLI_BOTH);


if ($record['u_id'] == $username && $record['password'] == $password) {
	
	//$_SESSION['items'] = '';
	$_SESSION['id'] =  $record['u_id'];
	//$name = $record['name'];
	$_SESSION['name'] = $record['name'];
	
	header("location: ../home.php");
}

else {
	echo "Username or Password is incorrect";
	header("Refresh: 5; url = ../login(customer).php");
}



?>

</body>
</html>