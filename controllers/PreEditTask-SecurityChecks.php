<?php
	
	include_once("../models/user.php");
	include_once("../models/task.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	
	if(!isset($_GET["var"]) || !isset($_GET["referrer"])) header("Location: ../views/Rooms");
	
	$TaskID = $_GET["var"];
	$referrer = $_GET["referrer"];
	
	//Multiple Security Checks
	$isUserSystemAdmin = user::isSystemAdmin($UserID);
	$isUsrAthrisd = user::isUserAutherisedToEditTask($UserID, $TaskID);
	$RoomID = task::getRoomIdByTaskId($TaskID);
	$taskDetails = task::getOneTask($TaskID);
	
	//current user is not System Admin (go in and check)
	if(!$isUserSystemAdmin)
	{
		//CHECK	
		//if user manipulated the task id (2 checks) OR IF HE IS NOT AUTHERISED TO EDIT THE TASK
		if($RoomID == NULL || $taskDetails == NULL || !$isUsrAthrisd) 
			header("Location: ../views/$referrer"); 
	}
	
?>
