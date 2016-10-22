<?php

		
	//-------------------------------------------	---------------------------------//
	//include_once("../models/user.php");
	//include_once("../models/room.php");
	//include_once("../models/device.php");
	//include_once("../models/sensor.php");
	//include_once("../models/task.php");

	//$isAdmin = $_SESSION["Admin"];
	//$UserID = $_SESSION["UserID"];
	//$RoomID = $_GET["var"];
	
	//^^^^^ALREADY INCLUDED IN (PreRoomSettings.php)- LEFT FOR CONVENIENCE^^^^^^
	//
	//-------------------------------------------	---------------------------------//
	//
	
	
	
	
	$Devices = Device::getDevicesDetailsByRoomID($RoomID);
	
	$Sensors = Sensor::getSensorsDetailsByRoomID($RoomID);
	
	$Tasks = task::getUserTasksForOneRoom($UserID, $RoomID);
	
	while ($row = $Tasks->fetch_assoc())
	{
					
			$actionTimeValue = "";
			$actionDateValue = "";
			$RepeatDailyValue = "";
			$isDisabledValue = "";
			
			if($row["ActionTime"] != NULL)
			{
				$actionTimeValue = " value = '$row[ActionTime]' ";
			}
			
			if($row["ActionDate"] != NULL)
			{
				$actionDateValue = " value = '$row[ActionTime]' ";
			}
			
			if($row["repeatDaily"] == 1)
			{
				$RepeatDailyValue = " checked ";
			}
			
			if($row["isDisabled"] == 1)
			{
				$isDisabledValue = " checked ";
			}			

						
			/*
			$row["selectedSensorID"]
			$row["devicesIDs"]
			$row["selectedDevicesStatus"]
			*/
			
	//form and table header	
	echo"<form method='post' action='../controllers/CreateNewTaskHandling.php'>
		<input type='hidden' name='UserID' value='$UserID'/>
		<input type='hidden' name='RoomID' value='$RoomID'/>
		
		<table id='viewTasksTable' margin-left:auto; margin-right:auto; width:90%;'><tr>
		<th width='10%'>Description</th>
		<th width='10%'>Duration (Minutes)</th>
		<th width='8%'>Repeat Daily</th>
		<th width='20%'>Selected Sensor</th>
		<th width='25%'>Selected Device/s Action</th>
		<th width='8%'>Disable Task</th>
		<th width='8%'>Save Changes</th>
		</tr>";
	
	
	//table body
	echo"<tr><td><input type='text' name='TaskName' value='$row[TaskName]'/></td>
		
		<td><input type='number' name='Duration_Minute' value='$row[Duration_Minute]' required/></td>
		
		<td><input type='checkbox' name='repeatDaily' id='repeatDaily' $RepeatDailyValue 
		onchange='HideUnhideActionDate();return false;'/>
		<div id='actionDate' style='display:none;'><br />
		<b>Action Date </b><input type='date' name='ActionDate' />
		</div></td><td>
		";
		
		while($row = $Sensors->fetch_assoc()) 
		{
			echo"<a  href='#' onclick='HideUnhideActionTime(this.childNodes[0].childNodes[0]);' 
			style='text-decoration:none; color:black' >";

			if ($row["SensorTypeID"] == 20)
			{
				echo"<label><input type='radio' name='sensors' id='clockSensor' value='$row[SensorID]' checked='checked'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='40' height='40' /></label></a>
				<div id='actionTime'>
				Action Time <input type='time' name='ActionTime' $actionTimeValue/></div>";
			}
			else
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='40' height='40' /></label>";
			}

			echo "</a><br />";
		}
		
		echo "</td><td>";
		
		while($row = $Devices->fetch_assoc()) 
		{
			echo"<table style='line-height: 20%; border-spacing:0.1; height: 50px;'>
			<tr><td><label>Don't Change<input type='radio' name='$row[DeviceID]' value='-1' checked/></label></td>
			<td><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='40' height='40' /></td></tr>
			<tr><td><label>ON <input type='radio' name='$row[DeviceID]' value='1'/></label></td></tr>
			<tr><td><label>OFF <input type='radio' name='$row[DeviceID]' value='0'/></label></td></tr></table>";
		}
			
			
		
				echo "</td>
				<td><input type='checkbox' name='isDisabled' id='isDisabled' $isDisabledValue </td>
				<th><input type='submit' name='SaveChanges' value='Save' /></th>
				</tr></table>
				</form>
				";
	}
	
?>
