<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"])){  header("Location: HomePage.php"); }


	include_once("../models/task.php");
	include_once("../models/user.php");

	$TaskID = $_GET['var'];
	$UserID = $_SESSION["UserID"];
	$referrer =  $_GET['referrer'];
	
	if(isset($_POST))
	{
		//CHECK if user is autherized to edit this task
		if(user::isUserAutherisedToEditTask($UserID, $TaskID)) task::deleteTask($TaskID);
		
		header("Location: ../views/$referrer");
	}
?>
