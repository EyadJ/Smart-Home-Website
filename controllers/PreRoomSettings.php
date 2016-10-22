<?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/sensor.php");
	include_once("../models/task.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	$RoomID = $_GET["var"];
	
	
	//CHECK if $_GET["var"]; (RoomID) iss manipulated by the user and that he 
	//isn't allowed to modify that room's settings
	
	if(!$isAdmin)
	{
		if(!User::isUserAutherisedForRoom($UserID, $RoomID))
		{
			header("Location:../views/Rooms.php");
		}
	}		
?>
