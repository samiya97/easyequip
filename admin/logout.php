<?php

	session_start();
session_destroy();
//header("location:index.php"); 
echo"<script>window.location.assign('index.php')</script>";

?>

