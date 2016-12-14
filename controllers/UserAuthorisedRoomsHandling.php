<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || !$_SESSION["isAdmin"]){  header("Location: HomePage.php"); } 

	include_once("../models/user.php");

	$UserID = $_GET['var'];
	$RoomID = $_GET['var2'];
	$newStatus = $_GET['var3'];
	
	$AdminUserName = $_SESSION["UserName"];
	
	if($newStatus == "Authorise")
	{
		user::AuthoriseRoom($UserID, $RoomID, $AdminUserName);
	}
	else if($newStatus == "unAuthorise")
	{
		user::unAuthoriseRoom($UserID, $RoomID, $AdminUserName);
	}
	
	header("Location:../views/UserAuthorisedRooms.php?var=$UserID");
?>