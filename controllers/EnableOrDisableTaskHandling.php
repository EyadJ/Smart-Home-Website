<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"])){  header("Location: HomePage.php"); }


	include_once("../models/task.php");
	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];
	$UserName = $_SESSION["UserName"];
	$isAdmin = $_SESSION["isAdmin"];
	
	$TaskID = $_GET['var'];
	$referrer =  $_GET['referrer'];
	
	$IsUserWhoCreatedTaskSystemAdmin = user::isUserWhoCreatedTaskSystemAdmin($TaskID);
	
	if(isset($_POST) && $IsUserWhoCreatedTaskSystemAdmin && $isAdmin)
	{
		task::EnableOrDisableTask($TaskID, $UserName, $isAdmin);
	}
	header("Location: ../views/$referrer");
?>
