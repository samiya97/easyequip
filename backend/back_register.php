<?php
session_start();
include("connection.php");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if (empty($_POST) == false) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$profession = $_POST['profession'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$repeatpass = $_POST['repeat-pass'];
	$type = $_POST['type'];


	if ($pass == $repeatpass){
		$qry = mysqli_query($con,"INSERT INTO `worker`(`name`, `email`, `gender`, `profession`, `username`, `pass`, `type`) VALUES ('$name', '$email','$gender','$profession', '$username', '$pass', '$type')");
		
		if ($qry == 1){
		echo "Registered";
		header ("Refresh: 1; url = ../login.php");
		}
		else {
		echo "Username already assigned!";
		echo "<br/>Please try another username.";
		header ("Refresh: 3; url = ../register.php");
		}
	}
	else {
		echo "Passwords do not match";
		header ("Refresh: 3; url = ../register.php");
	}
}

else {
	echo "Encountered some empty field";
	header ("Refresh: 2; url = ../register.php");
}
?>