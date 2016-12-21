<?php
	
	include_once("../models/user.php");
	include_once("../models/task.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	
	if(!isset($_GET["var"]) || !isset($_GET["referrer"])) header("Location: ../views/Rooms");
	
	$TaskID = $_GET["var"];
	$referrer = $_GET["referrer"];
	
	$RoomID = task::getRoomIdByTaskId($TaskID);
	$isUsrAthrisd = user::isUserAutherisedToEditTask($UserID, $TaskID);
	$taskDetails = task::getOneTask($TaskID);
	
	//CHECK	
	//if user manipulated the task id (3 checks)
	if($RoomID == NULL || !$isUsrAthrisd || $taskDetails == NULL) 
		header("Location: ../views/$referrer"); 
			
?>
