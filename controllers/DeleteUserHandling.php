<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || !$_SESSION["isAdmin"]){  header("Location: HomePage.php"); }


	include_once("../models/user.php");

	if(isset($_POST))
	{
		$AdminUserName = $_SESSION["UserName"];
		
		$deletedSuccessfully = user::deleteUser($_GET['var'], $AdminUserName);
		
		header("Location: ../views/Users.php");
	}
?>
