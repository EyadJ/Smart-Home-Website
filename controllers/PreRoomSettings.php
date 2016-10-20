<?php

	include_once("../models/User.php");
	include_once("../models/Room.php");
	include_once("../models/Device.php");
	include_once("../models/Sensor.php");
	include_once("../models/Task.php");

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
