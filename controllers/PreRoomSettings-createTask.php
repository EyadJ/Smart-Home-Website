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
		
		$i = 0;
		while($row = $Sensors->fetch_assoc()) 
		{
			$sensorTypeID = $row["SensorTypeID"];
			$sensorTypeIdArray[$i] =  $sensorTypeID;
			/*
			10 Motion Sensor		(the value of not detecting anything for a period of time)
			11 Smoke Detector		(Does not Have a value)-----------------------------------
			12 Temperature Sensor 	(Celsius)
			13 Light Sensor			(Light intensity)
			20 Clock				(It has its own veriable (Time: not a number))
			*/
			
			if ($sensorTypeID == 10) //Motion
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(10);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>
				<table id='10' style='display:none;' class='SensorsValues'><tr><td>
				<label><input type='radio' name='MotionSensorOption' value='onDetection' onclick='HideMotionSensorSecondaryOption();' checked/>
				Action On Detection</label></td></tr><tr><td>
				<label><input type='radio' name='MotionSensorOption' value='onNoDetection' onclick='UnhideMotionSensorSecondaryOption();'/>
				Action after no detection for a period of time</label>
				<table style='border:0; display:none;' id='MotionSensorDurationTable'>
				<tr><td>Duration of No Detection</td><tr></tr><td><input type='number' name='MotionSensorValue' placeholder='(Minutes)'/></td></tr>
				</table></td></tr>
				</table><br />";
			}
			else if ($sensorTypeID == 11) //Smoke
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(11);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label><br />";
			}
			else if ($sensorTypeID == 12) //Temperature
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(12);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>
				<div id='12' style='display:none;'  class='SensorsValues'>
				<table style='border:0; width:70%'>
				<tr><td>Required Temperature</td><tr></tr><td>
				<input type='number' name='TempSensorValue' placeholder='Temperature in Celsius'/>
				</td></tr>
				</table>
				</div><br />";
			}
			else if ($sensorTypeID == 13) //Light
			{
				echo"<label><input type='radio' name='sensors'value='$row[SensorID]' onclick='HideAllButParameter(13);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>
				<div id='13' style='display:none;' class='SensorsValues'>
				<table style='border:0; width:70%'>
				<tr><td>Required Light Status</td><tr></tr><td>
				<select name='LightSensorValue' >
				 <option value='700'>Night</option>
				 <option value='850'>Day</option>
				</select>
				</td></tr>
				</table>
				</div><br />";
			}
			else if ($sensorTypeID == 20) //Clock
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' checked='checked' onclick='HideAllButParameter(20);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>
				<div id='20' class='SensorsValues'>
				<table style='border:0; width:70%'>
				<tr><td>Action Time</td><tr></tr><td><input type='time' name='ActionTime'/></td></tr>
				</table>
				</div><br />";
			}
			$i++;
		}
		
				//-----to help when handling the sensors in the handling page-----//
			/*
			echo"<select name='SelectedSensor' id='SelectedSensor' style='display:none;'>";
			for ($i = 0; $i < count($sensorTypeIdArray); $i++)
			{
				if($sensorTypeIdArray[$i] == 10)
					echo "<option value='10'>Motion</option>";
				if($sensorTypeIdArray[$i] == 11)
					echo "<option value='11'>Smoke</option>";
				if($sensorTypeIdArray[$i] == 12)
					echo "<option value='12'>Temp</option>";
				if($sensorTypeIdArray[$i] == 13)
					echo "<option value='13'>Light</option>";
				if($sensorTypeIdArray[$i] == 20)
					echo "<option value='20'>Clock</option>";
			}
					echo "</select>";
					*/
				//----------------------------------------------------------------//	
		
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
				<td><input type='number' name='AlarmDuration' placeholder='(Minutes)' value=0 style='width:120px;'/></td></tr>
				<tr><td>Interval</td>
				<td><input type='number' name='AlarmInterval' placeholder='(Minutes)' value=0  style='width:120px;'/></td></tr>
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
