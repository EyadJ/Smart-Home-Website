<?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/sensor.php");
	include_once("../models/task.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	$RoomID = $_GET["RoomID"];
	
	//CHECK if $_GET["var"]; (RoomID) is manipulated by the user and if he 
	//isn't allowed to modify that room's settings
	
	if(!room::isRoomExists($RoomID) || (!$isAdmin && !user::isUserAutherisedForRoom($UserID, $RoomID)))
		header("Location:../views/Rooms.php");
		
?>
