<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"])){  header("Location: HomePage.php"); }


	include_once("../models/task.php");
	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];
	$UserName = $_SESSION["UserName"];
	$isAdmin = $_SESSION["isAdmin"];
	
	$TaskID = $_GET['var'];
	$action = $_GET['action'];
	$referrer =  $_GET['referrer'];
	
	//CHECK if user is autherized to edit this task
	if(isset($_POST) && user::isUserAutherisedToEditTask($UserID, $TaskID))
	{
		if($action === 'remove')
			task::removeTask($TaskID, $UserName, $isAdmin);
		
		else if($action === 'delete')
			task::deleteTask($TaskID, $UserName, $isAdmin);
	}
	header("Location: ../views/$referrer");
?>
