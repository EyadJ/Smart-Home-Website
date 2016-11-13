<?php

		
	//-------------------------------------------	---------------------------------//
	//include_once("../models/user.php");
	//include_once("../models/room.php");
	//include_once("../models/device.php");
	//include_once("../models/sensor.php");
	//include_once("../models/task.php");

	//$isAdmin = $_SESSION["isAdmin"];
	//$UserID = $_SESSION["UserID"];
	//$RoomID = $_GET["var"];
	
	//^^^^^ALREADY INCLUDED IN (PreRoomSettings.php)- LEFT FOR CONVENIENCE^^^^^^
	//
	//-------------------------------------------	---------------------------------//
	//
	
	$Devices = device::getDevicesDetailsByRoomID($RoomID);
	$Sensors = sensor::getSensorsDetailsByRoomID($RoomID);
		
		
	echo"<form method='post' action='../controllers/CreateNewTaskHandling.php'>
		<input type='hidden' name='UserID' value='$UserID'/>
		<input type='hidden' name='RoomID' value='$RoomID'/>
		
		<table id='CreateNewTaskTable' style='display:none; margin-left:auto; margin-right:auto; width:96%;'>
		<tr><th colspan='4'>Create New Task</th></tr>";
		
	//--------------------------------------------------------------------------//
		//SETTINGS
	
		//------Task Name-----//
		echo"<tr><th width='10%' rowspan='2'>Settings</th>	
		<td width='150px;'>Task Name <br />
		<input type='text' name='TaskName' placeholder='Simple Name for the Task' required/>
		</td>";
		
		//---Task Occurrence-----//	
		echo"<td width='250px'>
		<label style='float:left;' ><input type='radio' name='TaskOccurrence' value='repeat' checked 
		onchange='HideUnhideActionDate(0);return false;'/>Repeat Daily</label>
		
		
		<label style='float:left;' id='OneTimeAction'><input type='radio' name='TaskOccurrence' value='oneTime'
		onchange='HideUnhideActionDate(1);return false;'/>One-Time Task</label>
		
		<div id='actionDate' 
		style='	display:none; width:243px; border: 1px solid black; background-color:#CCCCCC;
		padding:5px; bottom:0; top:0; left:0; right:0; margin:auto;
		'>
		
		<label style='float:left;'><input type='radio' name='OneTimeAction' value='Today' onchange='HideAnotherActionDate();' checked/>Today</label> 
		
		<input type='date' name='TodayActionDate' value='" . date("Y-m-d") . "' style='float:right; width:130px; display:none;' readonly/>
		
		<label style='float:left;'><input type='radio' name='OneTimeAction' value='otherDate' onchange='ShowAnotherActionDate();'/>Another Date</label> 
		
		<input type='date' name='ActionDate' id='AnotherActionDate' style='float:right; display:none; width:130px;'/>
		
		</div>";
		
		//------Notify By Email-----//
		echo"</td><td width='130px'>
		<div class='tooltip'><span class='tooltiptext' style='margin-left:90px; margin-top:-70px;'>You Can Find this Option in Your Account Settings</span>
			<label><input type='checkbox' name='NotifyByEmail'/> 
			Notify me by Email / SMS</label>
			<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-8px; right:0px;'/>
		</div>
		
		</td></tr>";
		
		
		//--Enable/Disable Task on Time--//
		echo"<tr><td colspan='3'>
		
		<label><input type='checkbox' name='EnableTaskOnTime' id='EnableTaskOnTime' onchange='EnableTaskOnTimeValueHandling();'/>
		Enable Task on </label>
		<input type='time' name='EnableTaskOnTimeValue' id='EnableTaskOnTimeValue' onchange='EnableTaskOnTimeHandling();'/>
		
		&nbsp;&nbsp;&nbsp;&nbsp;
		
		<label><input type='checkbox' name='DisableTaskOnTime' id='DisableTaskOnTime' onchange='DisableTaskOnTimeValueHandling();'/>
		Disable Task on </label>
		<input type='time' name='DisableTaskOnTimeValue' id='DisableTaskOnTimeValue' onchange='DisableTaskOnTimeHandling();'/>
		
		</td></tr>";
		
	//--------------------------------------------------------------------------//
		//SENSORS
		
		echo "<tr><th width='10%'>Select one Sensor</th>
				<td colspan='3'>";
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
			
			echo "<div style='display:inline-block; '>";
		
			if ($sensorTypeID == 10) //Motion
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(10);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label>
				
				<div id='10' style='display:none; width:350px;' class='SensorsValues'>
				<table style='border:0;'><tr><td>
				<label><input type='radio' name='MotionSensorOption' value='onDetection' onclick='HideMotionSensorSecondaryOption();' checked/>
				Action On Detection</label>
				
				</td></tr><tr><td>
				
				<label><input type='radio' name='MotionSensorOption' value='onNoDetection' onclick='UnhideMotionSensorSecondaryOption();'/>
				Action after no detection for a period of time</label>
				
				<div style='display:none;' id='MotionSensorDurationTable'>
				<input type='number' name='MotionSensorValue' placeholder='Duration of No Detection (Minutes)'
						style='width:240px;'/>
				
				</div></td></tr></table></div>";
			}
			else if ($sensorTypeID == 11) //Smoke
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(11);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>";
			}
			else if ($sensorTypeID == 12) //Temperature
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(12);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>
				<div id='12' style='display:none;'  class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Required Temperature</td><tr></tr><td>
				<input type='number' name='TempSensorValue' placeholder='Temperature in Celsius'/>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 13) //Light
			{
				echo"<label><input type='radio' name='sensors'value='$row[SensorID]' onclick='HideAllButParameter(13);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>
				<div id='13' style='display:none; width:170px;' class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Required Light Status</td><tr></tr><td>
				<select name='LightSensorValue'>
				 <option value='1'>Sunrise</option>
				 <option value='0'>Sunset</option>
				</select>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 14) //Ultrasonic (Water Tanks)
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(14);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>
				<div id='14' style='display:none; width:170px;' class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Action on water level</td><tr></tr><td>
				<select name='UltraSonicSensorValue'>";
				
				for($i=10; $i<=100; $i=$i+10)
				{
					echo" <option value='$i'>$i%</option>";
				}
				 
				echo"</select>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 20) //Clock
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' checked='checked' onclick='HideAllButParameter(20);'/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>
				<div id='20' class='SensorsValues' style='display:inline-block;'>
				<table style='border:0;'>
				<tr><td>Action Time</td><tr></tr><td><input type='time' name='ActionTime'/></td></tr>
				</table>
				</div>";
			}
			
			echo "</div>";

			$i++;
		}
		
	//--------------------------------------------------------------------------//
		//DEVICES
		
		echo "</tr><tr><th width='10%'>Select Device/s Required Action</th>
				<td colspan='3'>";
		
		while($row = $Devices->fetch_assoc()) 
		{
			
			if($row["DeviceName"] == "Alarm")
			{
				echo "<table 
				style='
				width:120px; display:inline-table; 
				margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px;
				'>
				<tr><td colspan='2'><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='60' height='60' /></td></tr>
				
				<tr><td colspan='2'><label>Don't Change<input type='radio' 
				name='$row[DeviceID]' value='-1' onchange='HideAlarmDetails();' checked/></label></td></tr>
				
				<tr><td><label>OFF<input type='radio' 
				name='$row[DeviceID]' value='0' onchange='HideAlarmDetails();'/></label></td>
				
				<td><label>ON<input type='radio' 
				name='$row[DeviceID]' value='1' onchange='UnhideAlarmDetails();'/></label></td></tr>
				
				<tr id='alarmDetails' style='display:none;'><td colspan='2'>
				<table style='border:0; padding:0; margin:0;'>
				<tr><td>Duration</td>
				<td><input type='number' name='AlarmDuration' placeholder='(Min)' style='width:50px;' max='240'/></td></tr>
				<tr><td>Interval</td>
				<td><input type='number' name='AlarmInterval' placeholder='(Min)' style='width:50px;' max='60'/></td></tr>
				</table></td></tr>
				
				</table>";
			}
			else if($row["DeviceName"] == "Security Camera")
			{
				
				echo"<table style='
				width:120px; display:inline-table; 
				margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px;
				'>
				<tr><td colspan='2'><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='60' height='60' /></td></tr>
				
				<tr><td colspan='2'><label>Don't Change<input type='radio' 
				name='$row[DeviceID]' onchange='cameraSettings(this);' value='-1' checked/>
				</label></td></tr>
				
				<tr><td><label>OFF<input type='radio' 
				name='$row[DeviceID]' onchange='cameraSettings(this);' value='0'/>
				</label></td>
				
				<td><label>ON<input type='radio' 
				name='$row[DeviceID]' onchange='cameraSettings(this);' value='1'/>
				</label></td></tr>	
				
				<tr style='display:none;'><td colspan='2'>
				
					<table style='width:220px; margin:1px;'>
					
						<tr><td>	
				
						<label style='float:left; display:inline-block; ' >
						<input type='radio' name='cam-$row[DeviceID]-takeImgOrVideo' value='Img' checked/> Take </label>
						<span id=''><input type='number' name='cam-$row[DeviceID]-TakeImagesQty' placeholder='(Pic Number)' value=1  
						style='width:35px;'/> Picture/s</span>
						
						</td></tr><tr><td>
						
						<label style='float:left;'><input type='radio' name='cam-$row[DeviceID]-takeImgOrVideo' value='Vid'/> Take Video</label>
						<span id=''><input type='number' name='cam-$row[DeviceID]-TakeVideoDuration' placeholder='(Seconds)' value=30
						style='width:45px;'/> Seconds</span>
						
						</td></tr><tr><td>
						
						Resolution 
						<select name='cam-$row[DeviceID]-Resolution'>
							<option value='240'>240p</option>
							<option value='480'>480p</option>
						</select>
						
						</td></tr>
						
					</table>
					
				</td></tr>	
				</table>";
				
				echo "";
			}	
			else
			{
				echo"<table 
				style='
				width:120px; display:inline-table; 
				margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px;
				'>
				<tr><td colspan='2'><img src='../controllers/images/devices/$row[DeviceImgPath_on]' width='60' height='60' /></td></tr>
				<tr><td colspan='2'><label>Don't Change<input type='radio' name='$row[DeviceID]' value='-1' checked/></label></td></tr>
				<tr><td><label>OFF<input type='radio' name='$row[DeviceID]' value='1'/></label></td>
				<td><label>ON<input type='radio' name='$row[DeviceID]' value='0'/></label></td></tr>
				</table>";
			}
		}
			
		echo "</tr><tr><th colspan='4' style='height:28px;'><input type='submit' class='button' name='Create' value='Create' />
		</th></tr></table>
		</form><br />";
		
		
			
?>
