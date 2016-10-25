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
		
		
	echo"<form method='post' action='../controllers/CreateNewTaskHandling.php'>
		<input type='hidden' name='UserID' value='$UserID'/>
		<input type='hidden' name='RoomID' value='$RoomID'/>
		
		<table id='CreateNewTaskTable' style='display:none; margin-left:auto; margin-right:auto; width:80%;'>
		<tr><th width='30%'>Settings</th>
		<th width='35%'>Select one Sensor</th>
		<th width='35%'>Select Device/s Required Action</th></tr>";
		
	echo"<tr><td height='33%'>Description 
		<input type='text' name='TaskName' placeholder='Simple Name for the Task'/>
		</td><td rowspan='2'>";
		
		
		while($row = $Sensors->fetch_assoc()) 
		{
			echo"<a  href='#' onclick='HideUnhideActionTime(this.childNodes[0].childNodes[0]);' 
			style='text-decoration:none; color:black' >";

			if ($row["SensorTypeID"] == 20)
			{
				echo"<label><input type='radio' name='sensors' id='clockSensor' value='$row[SensorID]' checked='checked'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></a>
				<div id='actionTime'>
				<table style='border:0; width:85%'>
				<tr><td>Action Time</td><td><input type='time' name='ActionTime'/></td></tr>
				</table>
				</div>";
			}
			else
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>";
			}

			echo "</a><br />";
		}
		
		echo "</td><td rowspan='2'>";
		
		while($row = $Devices->fetch_assoc()) 
		{
			
			if($row["DeviceName"] == "Alarm")
			{
				echo "<table>
				<tr><td><label>Don't Change
				<input type='radio' name='$row[DeviceID]' value='-1' onchange='HideAlarmDetails();' checked/></label></td>
				<td rowspan='3'><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='60' height='60' /></td></tr>
				<tr><td><label>ON 
				<input type='radio' name='$row[DeviceID]' value='1' onchange='UnhideAlarmDetails();'/></label></td></tr>
				<tr><td><label>OFF 
				<input type='radio' name='$row[DeviceID]' value='0' onchange='HideAlarmDetails();'/></label></td></tr>
				
				<tr id='alarmDetails' style='display:none;'><td colspan='2'>
				
				<table style='border:0; padding:0; margin:0;'>
				<tr><td>Duration</td>
				<td><input type='number' name='AlarmDuration' placeholder='(Minutes)' style='width:120px;'/></td></tr>
				<tr><td>Interval</td>
				<td><input type='number' name='AlarmInterval' placeholder='(Minutes)' style='width:120px;'/></td></tr>
				</table></td></tr>
				</table>";
			}
			else
			{
				echo"<table>
				<tr><td><label>Don't Change<input type='radio' name='$row[DeviceID]' value='-1' checked/></label></td>
				<td rowspan='3'><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='60' height='60' /></td></tr>
				<tr><td><label>ON <input type='radio' name='$row[DeviceID]' value='1'/></label></td></tr>
				<tr><td><label>OFF <input type='radio' name='$row[DeviceID]' value='0'/></label></td></tr>
				</table>";
			}
		}
			
			
			
			
		echo"</td></tr>
		
		
		<tr><td height='34%'>
		<label>Repeat Daily <input type='checkbox' name='repeatDaily' id='repeatDaily' checked 
		onchange='HideUnhideActionDate();return false;'/></label>
		<div id='actionDate' style='display:none;'><br />
		<b>Action Date </b><input type='date' name='ActionDate' />
		</div></td></tr>
		";
		
			
			
		
				echo "<tr><th colspan='3'><input type='submit' name='Create' value='Create' />
				</th></tr></table>
				</form>
				";
		
		
			
?>
