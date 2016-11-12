<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["isAdmin"] == FALSE){  header("Location: HomePage.php"); }


	include_once("../models/user.php");

	if(isset($_POST))
	{
		$deletedSuccessfully = user::deleteUser($_GET['var']);
		
		header("Location: ../views/Users.php");
	}
?>
