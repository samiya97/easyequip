<?php 
	require_once 'config.php';
	unset($_SESSION['fb_access_token']);
	session_destroy();
	header('Location: index.php');
	
?>