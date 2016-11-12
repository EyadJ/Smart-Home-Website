<?php

	/*	
	//----------------------------------------------------------------------------//
	//
	include_once("../models/user.php");
	include_once("../models/task.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	$TaskID = $_GET["var"];
	$referrer = $_GET["referrer"];
	
	$RoomID = task::getRoomIdByTaskId($TaskID);
	$isUsrAthrisd = user::isUserAutherisedToEditTask($UserID, $TaskID);
	$taskDetails = task::getOneTask($TaskID);
	
	//CHECK
	if($RoomID == NULL || !$isUsrAthrisd || $taskDetails == NULL) header("Location: ../views/$referrer"); //if user manipulated the task id (3 checks)
	
	//
	//^^^^^ALREADY INCLUDED IN (PreEditTask-SecurityChecks.php)- LEFT FOR CONVENIENCE^^^^^^
	//
	//-------------------------------------------	---------------------------------//
	*/
	
	include_once("../models/device.php");
	include_once("../models/sensor.php");
	
	$Devices = device::getDevicesDetailsByRoomID($RoomID);
	$Sensors = sensor::getSensorsDetailsByRoomID($RoomID);
	
	$taskDetails = $taskDetails->fetch_assoc();
	
	echo"<form method='post' action='../controllers/EditTaskHandling.php'>
		<input type='hidden' name='UserID' value='$UserID'/>
		<input type='hidden' name='RoomID' value='$RoomID'/>
		<input type='hidden' name='referrer' id='referrer' value='$referrer'/>
		
		<table margin-left:auto; margin-right:auto; width:90%;'>
		<tr><th colspan='4'>Edit Task</th></tr>";
		
	
	//--------------------------------------------------------------------------//
		//SETTINGS
	
	$text1 = ""; $text2 = ""; $text3 = ""; $text4 = ""; $text5 = ""; $text6 = ""; 
	$text7 = ""; $text8 = ""; $text9 = ""; $text10 = ""; $text11 = ""; 
	
	// Task Name
	echo"<tr><th width='10%' rowspan='2'>Settings</th>	
		<td width='150px;'>Task Name <br />
		<input type='text' name='TaskName' value='$taskDetails[TaskName]' placeholder='Simple Name for the Task' required/>
		</td>";
		
		//-----------------TaskOccurrence----------------//
		$repeatDaily = $taskDetails["repeatDaily"];
		$ActionDate = $taskDetails["ActionDate"];
		
		if($repeatDaily == TRUE)
		{
			$text1 = "checked";
			$text5 = "display:none;";
		}
		else
		{
			$text2 = "checked";
			$text5 = "display:inline-block;";
			$text7 = "background-color:#CCCCCC; border:1px solid black;";
			
			if($ActionDate == date("Y-m-d")) //Today
			{
				$text3 = "checked";
				$text6 = "display:none;";
			}
			else
			{
				$text4 = "checked"; 
				//$text5 = "value='$ActionDate'"; 
			}
		}

		echo"<td width='250px'>
		<label style='float:left;' ><input type='radio' name='TaskOccurrence' value='repeat' $text1 
		onchange='HideUnhideActionDate(0);return false;'/>Repeat Daily</label>
		
		<label style='float:left; $text7' id='OneTimeAction'><input type='radio' name='TaskOccurrence' value='oneTime' $text2
		onchange='HideUnhideActionDate(1);return false;'/>One-Time Task</label>
		
		<div id='actionDate' 
		style=' $text5 width:243px; border: 1px solid black; background-color:#CCCCCC;
		padding:5px; bottom:0; top:0; left:0; right:0; margin:auto;
		'>
		
		<label style='float:left;'><input type='radio' name='OneTimeAction' value='Today' onchange='HideAnotherActionDate();' $text3/>Today</label> 
		
		<input type='date' name='TodayActionDate' value='" . date("Y-m-d") . "' style='float:right; width:130px; display:none;' readonly/>
		
		<label style='float:left;'><input type='radio' name='OneTimeAction' value='otherDate' onchange='ShowAnotherActionDate();' $text4 />Another Date</label> 
		
		<input type='date' name='ActionDate' id='AnotherActionDate' value='$ActionDate' style='float:right; width:130px; $text6'/>
		
		</div>";
		
		//------------------NotifyByEmail----------------//
		$text1 = ""; 
		
		$NotifyByEmail = $taskDetails["NotifyByEmail"];
		
		if($NotifyByEmail == TRUE)
			$text1 = "checked";
		
		echo"</td><td width='110px'>
		<label><input type='checkbox' name='NotifyByEmail' $text1/> 
		Notify me by Email</label>
		
		</td></tr>";
		
		
		//---------Enable/Disable Task on Time----------//
		if (isset($taskDetails["EnableTaskOnTime"]))
		{
			$text8 = " value='" . $taskDetails["EnableTaskOnTime"] . "' "; 
			$text10 = "checked";
		}
		
		if (isset($taskDetails["DisableTaskOnTime"]))
		{
			$text9 = " value='" . $taskDetails["DisableTaskOnTime"] . "' "; 
			$text11 = "checked";
		}
		
		echo"<tr><td colspan='3'>
		
		<label><input type='checkbox' name='EnableTaskOnTime' id='EnableTaskOnTime' onchange='EnableTaskOnTimeValueHandling();' $text10/>
		Enable Task on </label>
		<input type='time' name='EnableTaskOnTimeValue' id='EnableTaskOnTimeValue' onchange='EnableTaskOnTimeHandling();' $text8/>
		
		&nbsp;&nbsp;&nbsp;&nbsp;
		
		<label><input type='checkbox' name='DisableTaskOnTime' id='DisableTaskOnTime' onchange='DisableTaskOnTimeValueHandling();' $text11/>
		Disable Task on </label>
		<input type='time' name='DisableTaskOnTimeValue' id='DisableTaskOnTimeValue' onchange='DisableTaskOnTimeHandling();' $text9/>
		
		</td></tr>";
		
	//--------------------------------------------------------------------------//
		//SENSORS
		
		echo "<tr><th width='10%'>Select one Sensor</th>
				<td colspan='3'>";
				
		$SelectedSensorValue = $taskDetails["SelectedSensorValue"];	
		$SelectedSensorID = $taskDetails["SensorID"];	
		
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
			
			$checkSelectedSensor = "";
			$SelectedSensorDisplay = "none";
			$SelectedSensorValueText = "";
			//
			if($row["SensorID"] == $SelectedSensorID)
			{
				$checkSelectedSensor = "checked";
				$SelectedSensorDisplay = "inline-block";
				$SelectedSensorValueText = "value='$SelectedSensorValue'";
			}
			
			echo "<div style='display:inline-block; '>";
		
		
			if ($sensorTypeID == 10) //Motion
			{
				$text1 = ""; $text2 = ""; $text3 = "";  $text4 = ""; 
		
				if($SelectedSensorValue == 0) //Action On Detection
				{
					$text1 = "checked";
					$text3 = "none";
				}
				else //Action after no detection for a period of time
				{
					$text2 = "checked";
					$text3 = "inline-block";
					$text4 = "value='$SelectedSensorValue'";
				}
		
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(10);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60'/></label>
				
				<div id='10' style='display:$SelectedSensorDisplay; width:350px;' class='SensorsValues'>
				<table style='border:0;'><tr><td>
				<label><input type='radio' name='MotionSensorOption' value='onDetection' onclick='HideMotionSensorSecondaryOption();' $text1/>
				Action On Detection</label>
				
				</td></tr><tr><td>
				
				<label><input type='radio' name='MotionSensorOption' value='onNoDetection' onclick='UnhideMotionSensorSecondaryOption();' $text2/>
				Action after no detection for a period of time</label>
				
				<div style='display:$text3;' id='MotionSensorDurationTable'>
				<input type='number' name='MotionSensorValue' placeholder='Duration of No Detection (Minutes)' 
						style='width:240px;' $text4/>
				
				</div></td></tr></table></div>";
			}
			else if ($sensorTypeID == 11) //Smoke
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(11);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60'/></label></div>";
			}
			else if ($sensorTypeID == 12) //Temperature
			{
				
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(12);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60'/></label></div>
				<div id='12' style='display:$SelectedSensorDisplay;' class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Required Temperature</td><tr></tr><td>
				<input type='number' name='TempSensorValue' placeholder='Temperature in Celsius' $SelectedSensorValueText/>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 13) //Light
			{
				$text1 = ""; $text2 = "";
		
				if($SelectedSensorValue == 1) //Sunrise
					$text1 = "selected";
				else if ($SelectedSensorValue == 0) //Sunset
					$text2 = "selected";
				
				echo"<label><input type='radio' name='sensors'value='$row[SensorID]' onclick='HideAllButParameter(13);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60'/></label></div>
				<div id='13' style='display:$SelectedSensorDisplay; width:170px;' class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Required Light Status</td><tr></tr><td>
				<select name='LightSensorValue'>
				 <option value='1' $text1>Sunrise</option>
				 <option value='0' $text2>Sunset</option>
				</select>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 14) //Ultrasonic (Water Tanks)
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(14);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60' /></label></div>
				<div id='14' style='display:$SelectedSensorDisplay; width:170px;' class='SensorsValues'>
				<table style='border:0;'>
				<tr><td>Action on water level</td><tr></tr><td>
				<select name='UltraSonicSensorValue'>";
				
				for($i=10; $i<=100; $i=$i+10)
				{
					if($i == $SelectedSensorValue)
						echo" <option value='$i' selected>$i%</option>";
					else
						echo" <option value='$i'>$i%</option>";
				}
				 
				echo"</select>
				</td></tr>
				</table>
				</div>";
			}
			else if ($sensorTypeID == 20) //Clock
			{
				echo"<label><input type='radio' name='sensors' value='$row[SensorID]' onclick='HideAllButParameter(20);' $checkSelectedSensor/>
				<img src='../controllers/images/sensors/$row[SensorImgPath]' width='60' height='60'/></label></div>
				<div id='20' class='SensorsValues' style='display:$SelectedSensorDisplay;'>
				<table style='border:0;'>
				<tr><td>Action Time</td><tr></tr><td><input type='time' name='ActionTime' value = '$taskDetails[ActionTime]' /></td></tr>
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
		
		$devices_Original = device::getDevicesDetailsByRoomID($RoomID);
		$devicesArray;
		
		$i = 0;
		while($row = $devices_Original->fetch_assoc()) 
		{
			$devicesArray[$i]["DeviceID"] = $row["DeviceID"];
			$devicesArray[$i]["DeviceImgPath_on"] = $row["DeviceImgPath_on"];
			$devicesArray[$i]["DeviceName"] = $row["DeviceName"];
			
			$i++;
		}
		
		$taskDevices = task::getTaskDevices($TaskID);
		$taskDevicesArray;
		//
		while ($DeviceRow = $taskDevices->fetch_assoc())
		{
			$devID = $DeviceRow["DeviceID"];
			$taskDevicesArray[$devID]["ReqDevState"] = $DeviceRow["RequiredDeviceStatus"];
		}
		//
		//
		$taskCameras = task::getTaskCameras($TaskID);
		$taskCamerasArray;
		//
		if($taskCameras != NULL) 	//for device = camera
		{
			while ($CameraRow = $taskCameras->fetch_assoc())
			{
				$devID = $CameraRow["DeviceID"];
				
				$taskCamerasArray[$devID]["ReqDevState"] = $CameraRow["RequiredDeviceStatus"];
				$taskCamerasArray[$devID]["TakeImage"] = $CameraRow["TakeImage"];
				$taskCamerasArray[$devID]["TakeVideo"] = $CameraRow["TakeVideo"];
				$taskCamerasArray[$devID]["Resolution"] = $CameraRow["Resolution"];
			}
		}
		//
		//
		for ($i = 0; $i < count($devicesArray); $i++)
		{
			$currentDevID = $devicesArray[$i]["DeviceID"];
			$DeviceImgPath = $devicesArray[$i]["DeviceImgPath_on"];
			$DeviceName = $devicesArray[$i]["DeviceName"];
			
			$option1 = ""; $option2 = ""; $option3 = ""; $ReqDevState = -1;
			$displayStatus1 = "none"; $displayStatus2 = "none";
				
			if($DeviceName != "Security Camera")
			{
				$ReqDevState = $taskDevicesArray[$currentDevID]["ReqDevState"];
				
				if($ReqDevState == -1)
				{
					$option1 = "checked";
				}
				else if($ReqDevState == 1 && $DeviceName == "Alarm") 
				{
					$option2 = "checked";
					$displayStatus1 = "table-row";
				}
				else if($ReqDevState == 1)
				{
					$option2 = "checked";
				}
				else if($ReqDevState == 0) 
				{
					$option3 = "checked";
				}
			}
			
			//
			if($DeviceName == "Alarm")
			{
				$AlarmDuration = $taskDetails["AlarmDuration"];
				$AlarmInterval = $taskDetails["AlarmInterval"];
				
				echo "<table 
				style='
				width:120px; display:inline-table; 
				margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px;
				'>
				<tr><td colspan='2'><img src='../controllers/images/devices/$DeviceImgPath' width='60' height='60' /></td></tr>
				
				<tr><td colspan='2'><label>Don't Change<input type='radio' 
				name='$currentDevID' value='-1' onchange='HideAlarmDetails();' $option1/></label></td></tr>
				
				<tr><td><label>OFF<input type='radio' 
				name='$currentDevID' value='0' onchange='HideAlarmDetails();'$option3/></label></td>
				
				<td><label>ON<input type='radio' 
				name='$currentDevID' value='1' onchange='UnhideAlarmDetails();' $option2/></label></td></tr>
				
				<tr id='alarmDetails' style='display:$displayStatus1;'><td colspan='2'>
				<table style='border:0; padding:0; margin:0;'>
				<tr><td>Duration</td>
				<td><input type='number' name='AlarmDuration' placeholder='(Minutes)' value=$AlarmDuration style='width:35px;'/></td></tr>
				<tr><td>Interval</td>
				<td><input type='number' name='AlarmInterval' placeholder='(Minutes)' value=$AlarmInterval  style='width:35px;'/></td></tr>
				</table></td></tr>
				
				</table>";
			}
			else if($DeviceName == "Security Camera")
			{
				
				$option1 = ""; $option2 = ""; $option3 = ""; $option4 = ""; 
				$option5 = ""; $option6 = ""; $option7 = ""; 
				$displayStatus1 = "none"; $TakeImage = 1; $TakeVideo = 30;
				
				$ReqDevState = $taskCamerasArray[$currentDevID]["ReqDevState"];
			
				if($ReqDevState == -1)
					$option1 = "checked";
				
				else if ($ReqDevState == 0)
					$option2 = "checked";
				
				else if ($ReqDevState == 1)
				{
					$option3 = "checked";
					$displayStatus2 = "table-row";
					
					if($taskCamerasArray[$currentDevID]["TakeImage"] != -1)		//takeImage selected
					{
						$TakeImage = $taskCamerasArray[$currentDevID]["TakeImage"];
						$option6 = "checked";
					}
					else														//takeVideo selected
					{
						$TakeVideo = $taskCamerasArray[$currentDevID]["TakeVideo"];
						$option7 = "checked";
					}
					
					$Resolution = $taskCamerasArray[$currentDevID]["Resolution"];
				}
				
				echo"<table style='
				display:inline-table; width:120px; margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px; '>
				<tr><td colspan='2'><img src='../controllers/images/devices/$DeviceImgPath' width='60' height='60' /></td></tr>
				
				<tr><td colspan='2'><label>Don't Change<input type='radio' name='$currentDevID' value='-1' 
				onchange='cameraSettings(this);' $option1/></label></td></tr>
				
				<tr><td><label>OFF<input type='radio' name='$currentDevID' value='0' 
				onchange='cameraSettings(this);' $option2/></label></td>
				
				<td><label>ON<input type='radio' name='$currentDevID' value='1' 
				onchange='cameraSettings(this);' $option3/></label></td></tr>";
				
				//if camera is set to be ON, display this <tr> with the details inside it
				echo "<tr style='display:$displayStatus2;'><td colspan='2'>
						<table style='width:220px; margin:1px;'><tr><td>	
				
					<label><input type='radio' name='cam-$currentDevID-takeImgOrVideo' value='Img' checked/> Take </label>
					
					<span id=''><input type='number' name='cam-$currentDevID-TakeImagesQty' 
					placeholder='(Pic Number)' value=$TakeImage  
					style='width:35px;' $option6/> Picture/s</span>
					
					</td></tr><tr><td>
					
					<label><input type='radio' name='cam-$currentDevID-takeImgOrVideo' value='Vid' $option7/> Take Video</label>
					
					<span id=''><input type='number' name='cam-$currentDevID-TakeVideoDuration' 
					placeholder='(Seconds)' value=$TakeVideo 
					style='width:35px;'/>Seconds</span>
					
					</td></tr><tr><td>
						
						Resolution
							<select name='cam-$currentDevID-Resolution'>";
						
						//$Resolution = $taskCamerasArray[$currentDevID]["Resolution"];		^^UP^^
						
						$ResolutionValues = array(360, 480, 720);
						
						for($j = 0; $j < count($ResolutionValues); $j++)
						{
							$isSelected = "";	$ResValue = $ResolutionValues[$j];
							
							if ($Resolution == $ResolutionValues[$j]) $isSelected = " Selected ";
							
							echo"<option value='" . $ResValue . "' $isSelected>" . $ResValue . "p</option>";
						}
						
						echo"
							</select>
						</td></tr>
					</table>
						
					</td></tr>	
					</table>";
			}
			else
			{
				echo"<table 
				style='
				width:120px; display:inline-table; 
				margin-right:5px; margin-left:5px; margin-top:1px; margin-bottom:1px;
				'>
				<tr><td colspan='2'><img src='../controllers/images/devices/$DeviceImgPath' width='60' height='60' /></td></tr>
				
				<tr><td colspan='2'><label>Don't Change<input type='radio' name='$currentDevID' value='-1' $option1/></label></td></tr>
				
				<tr><td><label>OFF<input type='radio' name='$currentDevID' value='0' $option3/></label></td>
				
				<td><label>ON<input type='radio' name='$currentDevID' value='1' $option2/></label></td></tr>
				</table>";
			}
		}
		//--------------------------------------------------------------------------//
		
		
		//------------------isDisabled----------------
		$text1 = ""; 
		
		$isDisabled = $taskDetails["isDisabled"];
		
		if($isDisabled == TRUE)
			$text1 = "checked";
		
		echo"</tr><tr><td colspan='4' style='background-color:#CCCCCC;'>
		<label><input type='checkbox' name='isDisabled' $text1/> 
		<b>Disable Task</b></label>
		
		</td></tr>";
		
		//--------------------------------------------------------------------------//	
		//FOOTER
		
		echo "<tr ><th colspan='4' style='height:28px;'>
		
		<input type='submit' value='Save' name='Save' style='font-weight:bold; margin-left:3px;' />&nbsp;
		
		<input type='reset' value='Reset' />&nbsp;";
		
		$isDefault = $taskDetails["isDefault"];
		
		if(!$isDefault)
			echo"<a href='#' onclick='deleteTaskMsg($TaskID);return false;' style='text-decoration:none;'>
			<button type = 'button' style='color:red;'>Delete</button>	</a>";
		
		else	//$isDefault == TRUE (Undeleteable)
			echo"<div style=' margin-left:auto; margin-right:auto; width:50px; display:inline;'>
					<div class='tooltip'>
						<span class='tooltiptext'>
							This Task is a Default Task, Therefore it is Undeletable.<br /> But you can Disable it.
						</span>
						<button type = 'button' style='color:gray;' disabled>Delete</button>
					</div>
				</div>";
			
		echo"&nbsp;<a href='../views/$referrer'><button type = 'button'>Cancel</button></a>
		
		</th></tr></table>
		</form>
		";
	
		
			
?>
