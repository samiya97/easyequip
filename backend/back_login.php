<?php
session_start();
include("connection.php");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];

$qry = mysqli_query($con,"SELECT * FROM `worker` WHERE `username` = '$username' and `pass` = '$pass'") or die ("Cant select data from Database".mysql_error());
$record = mysqli_fetch_array($qry,MYSQLI_BOTH);


if ($record['username'] == $username && $record['pass'] == $pass) {

	$_SESSION['userid'] = $record['username'];
	$_SESSION['name'] =  $record['name'];
	$_SESSION['type'] = $record['type'];
	$_SESSION['profession'] = $record['profession'];
	
	header("location: ../workerhome.php");
}

else {
	echo "Username or Password is incorrect";
	header("Refresh: 3; url = ../login.php");
}



?>