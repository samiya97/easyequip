<?php

	if(!session_id()){
		session_start();
	}
	$link = mysqli_connect("localhost", "root", "", "easyequip");

	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$name = $_POST["name"];
	$email= $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$result = mysqli_query($link,"INSERT INTO `tbl_contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')");

	if ($result == 1){
		echo "Thanks, Will try to reply you soon";
		header ("Refresh: 5; url = contact.php");
	}

	else {
		echo "Not Inserted".'<br>';
		echo "Insert Again";
		header ("Refresh: 5; url = contact.php");
	}
?>
