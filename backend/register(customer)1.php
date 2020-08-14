<?php
include("connection.php");


if (empty($_POST) == false) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$cellno = $_POST['cellno'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repeatpass = $_POST['repeat-pass'];


	if ($password == $repeatpass){		
		$qry = mysqli_query($link,"INSERT INTO `tbl_user`(`name`, `email`, `gender`, `cellno`, `u_id`, `password`) VALUES ('$name', '$email','$gender','$cellno', '$username', '$password')");


		if ($qry == 1){
			echo "Registered";
			header ("Refresh: 1; url = ../login(customer).php");
		}
		else {
			echo "Username already assigned!";
			echo "<br/>Please try another username.";
			header ("Refresh: 3; url = ../register(customer).php");
		}
	}
	else {
		echo "Passwords do not match";
		header ("Refresh: 3; url = ../register(customer).php");
	}
}

else {
	echo "Encountered some empty field";
	header ("Refresh: 2; url = ../register.php");
}
?>