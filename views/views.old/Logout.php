<?php
	error_reporting(0); 
	session_start();
	session_destroy();
	session_unset();
   header("Location: homepage.php");
?>