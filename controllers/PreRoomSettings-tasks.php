<?php

		
	//----------------------------------------------------------------------------//
	//include_once("../models/User.php");
	//include_once("../models/Room.php");
	//include_once("../models/Device.php");
	//include_once("../models/Sensor.php");
	//include_once("../models/Task.php");

	//$isAdmin = $_SESSION["Admin"];
	//$UserID = $_SESSION["UserID"];
	//$RoomID = $_GET["var"];
	
	//^^^^^ALREADY INCLUDED IN (PreRoomSettings.php)- LEFT FOR CONVENIENCE^^^^^^
	//
	//-------------------------------------------	---------------------------------//
	// 
		
		$Devices = Device::getDevicesDetailsByRoomID($RoomID);
		
		echo'<form method="post" action="../controllers/CreateNewTask.php?var=' . $RoomID . '">
		<table id="CreateNewTaskTable" style="display:none; margin-left:auto; margin-right:auto; width:90%;"><tr><th>
				<input type="submit" value="Create" />
				</th></tr></table>
				</form>
				';
		
		
			
?>
