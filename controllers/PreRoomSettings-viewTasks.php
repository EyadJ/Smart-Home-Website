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
	

//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
		
		$Tasks = task::getAllUsersTasksForOneRoom($RoomID);
		
		if($Tasks != NULL)
		{

//--------------------Store Users, Devices And Sensors in arrays in order to increase the system's performance---------------------//
	
			$devices = NULL;
			$sensors = NULL;
			
			$devices_Original = device::getDevicesDetailsByRoomID($RoomID);

			while($row = $devices_Original->fetch_assoc()) 
			{
				$devices[$row["DeviceID"]]["DeviceImgPath_on"] = $row["DeviceImgPath_on"];
				$devices[$row["DeviceID"]]["DeviceName"] = $row["DeviceName"];
			}
			//
			//
			$sensors_Original = sensor::getSensorsDetailsByRoomID($RoomID);

			while($row = $sensors_Original->fetch_assoc()) 
			{
				$sensorID = $row["SensorID"];
				//
				$sensors[$sensorID]["SensorTypeID"] = $row["SensorTypeID"];
				$sensors[$sensorID]["SensorImgPath"] = $row["SensorImgPath"];
			}
			//
			//
			$AllUsers = user::getUsersDetails();
			$AllUsersArray;
			
			while ($row = $AllUsers->fetch_assoc())
			{
				$CurrentUserID = $row["UserID"];
				//
				$AllUsersArray[$CurrentUserID]["UserName"] = $row["UserName"];
				$AllUsersArray[$CurrentUserID]["UserImagePath"] = $row["UserImagePath"];
				$AllUsersArray[$CurrentUserID]["isAdmin"] = $row["isAdmin"];
			}
			//
			//
			//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
			//form and table header	(one task)

			echo"<table id='viewAllTasksTable' style=' border: none;'>
				<tr style='line-height: 16px;'>
				<th width='10%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Name</th>
				<th width='6.5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Repeat Daily</th>
				<th width='15%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Sensor</th>
				<th width='30%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Device/s Action</th>
				<th width='3%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Notify By Email</th>
				<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Created By</th>
				<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Enabled</th>
				<th width='3%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Edit Task</th>
				</tr>";
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//			
			
			// (TASKS LOOP):
			
			while ($row = $Tasks->fetch_assoc())
			{
					//$actionTimeValue = "";
					//$actionDateValue = "";
					$RepeatDailyValue = $row["repeatDaily"];
					$isDisabledValue = "";
					$NotifyByEmailValue = ""; $resul = "30";
					$TaskID = $row["TaskID"];
					$SelectedSensorValue = $row["SelectedSensorValue"];
					$UWCT_UID = $row["UserID"];		//UserWhoCreatedTask_UserID
					$UWCT_UN = $AllUsersArray[$UWCT_UID]["UserName"];		//UserWhoCreatedTask_UserName
					$UWCT_IP = $AllUsersArray[$UWCT_UID]["UserImagePath"];		//UserWhoCreatedTask_ImagePath
					$UWCT_iA = $AllUsersArray[$UWCT_UID]["isAdmin"];		//UserWhoCreatedTask_isAdmin
					
					
					$isAdminValue = "User";
					if($UWCT_iA == 1)
						$isAdminValue = "Admin";
					
					$selectedSensorID = $row["SensorID"];
					
					$taskDevices = task::getTaskDevices($TaskID);
					
					$taskDevicesArray ;
					$i = 0;
					
					while ($DeviceRow = $taskDevices->fetch_assoc())
					{
						$taskDevicesArray[$i]["DeviceID"] = $DeviceRow["DeviceID"];
						$taskDevicesArray[$i]["ReqDevState"] = $DeviceRow["RequiredDeviceStatus"];
						$i++;
					}

					if($row["isDisabled"] == 1)
					{
						$isDisabledValue = "x-red.png";
					}
					else // if($row["isDisabled"] == 0)
					{
						$isDisabledValue = "Checkmark1.png";
					}
					
					if($row["NotifyByEmail"] == 1)
					{
						$NotifyByEmailValue = "mail-sent.png";
						$resul = "40";
					}
					else // if($row["NotifyByEmail"] == 0)
					{
						$NotifyByEmailValue = "mail-not-sent.png";
						$resul = "35";
					}
					
				//this is a class name according to every user id so it would be ready in case a filter was used
			$text = "TaskOfUser_" . $UWCT_UID . "";
				
			echo "
				<tr style='border:0px; background-color:white; height:17px;' class='taskDiv $text'>
				<td style='border:0px;'></td><td style='border:0px;'></td><td style='border:0px;'></td>
				<td style='border:0px;'></td><td style='border:0px;'></td><td style='border:0px;'></td>
				<td style='border:0px;'><td style='border:0px;'></td>
				</tr>";
			
			
			//table body (one task) "ALL OF THE FOLLOWING"
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
				//TASK NAME
			
			echo"<tr class='taskDiv $text'>
				<td style='border-bottom: 2px solid black; border-top: 2px solid black;'><b>$row[TaskName]</b></td>
			
				<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//				
				//REPEAT DAILY
				
				if($RepeatDailyValue == 0)
				{
					echo "<img src='../controllers/images/NoRepeatDaily.png' width='30' height='30' />
					<div style='display:inline;'><br />
					<b>Action Date </b>";
					
					if ($row["ActionDate"] === date("Y-m-d"))
						echo "<i>(Today)</i>";
					
					echo "<input type='text' name='ActionDate' value = '$row[ActionDate]' 
					style='width:75px;' readonly/></div>";
				}
				else if ($RepeatDailyValue == 1)
				{
					echo "<img src='../controllers/images/Checkmark1.png' width='30' height='30' />";
				}
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
				//SENSOR
				
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				$sensorTypeID = $sensors[$selectedSensorID]["SensorTypeID"];
				$sensorImgPath = $sensors[$selectedSensorID]["SensorImgPath"];
				
				echo"<img src='../controllers/images/sensors/" . $sensorImgPath . "' width='40' height='40' />";
				
				if ($sensorTypeID == 10) //Motion
				{
					if($SelectedSensorValue == 0) //Action on Detection
					{
						echo "<br /><b>Take Action<br />On Detection</b>";
					}
					else
					{
						echo"<br /><b>After no Detection</b><br />
						<input type='number' name='MotionValue' value = '$SelectedSensorValue' style='width:50px;' readonly/> Minutes";
					}
					
				}
				else if ($sensorTypeID == 11) //Smoke
				{
					//nothing
				}
				else if ($sensorTypeID == 12) //Temperature
				{
					echo"<br /><b>Temperature</b><br />
					<input type='number' name='TempValue' value = '$SelectedSensorValue' style='width:35px;' readonly/> Celsius";
				}
				else if ($sensorTypeID == 13) //Light
				{
					$lightSensorValue = $SelectedSensorValue;
					
					echo"<br /><b>Light Status</b><br />";
					$textValue =  "";
					
					if ($lightSensorValue == 1)
						$textValue = "On Sunrise";
					
					else if ($lightSensorValue == 0)
						$textValue = "On Sunset";
					
					echo"<input type='text' name='LightValue' value = '$textValue' style='width:80px;' readonly/>";
				}
				else if ($sensorTypeID == 14) //Ultrasonic
				{
					echo"<br /><b>Action on<br />
					 Water Level </b><input type='text' name='UltrasonicValue' value = '$SelectedSensorValue%' style='width:45px;' readonly/>";
				}
				else if ($sensorTypeID == 20) //Clock
				{
					echo"<br /><b>Action Time</b><br />
					<input type='time' name='ActionTime' value = '$row[ActionTime]' style='width:100px;' readonly/>";
				}
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//			
				//DEVICES
					
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				for ($i = 0; $i < count($devices); $i++)
				{
					$CurrentDevID = $taskDevicesArray[$i]["DeviceID"];
					$additional = "";
					$ReqDevState = $taskDevicesArray[$i]["ReqDevState"];
					$DeviceName = $devices[$CurrentDevID]["DeviceName"];
					$DeviceImgPath = $devices[$CurrentDevID]["DeviceImgPath_on"];
					
					if($ReqDevState == -1) $additional = "not-available.png";
					else if($ReqDevState == 1) $additional = "on.png";
					else if($ReqDevState == 0) $additional = "off.png";
					
					if($DeviceName === "Alarm" && $ReqDevState == 1)
					{
						echo"<table 
						onmouseover='showAlarmDetails(this.nextSibling.nextSibling);' 
						onmouseout='hideAlarmDetails(this.nextSibling.nextSibling);' 
						style='width:80px; margin:5; border:0; display:inline;'>
						<tr><td>
						<img src='../controllers/images/devices/" . $DeviceImgPath . "' width='40' height='40' />
						<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</td></tr><tr><td style='border:0;'>
						<img src='../controllers/images/$additional' height='20' />
						</td></tr></table>";
						
						echo"
						<table
						style='
						width:110px; border:0; padding:0; margin:0; position:absolute; 
						display:none; background-color:#CCCCCC; z-index:2; font-size:11px;
						'>
						<tr><td>Duration
						<input type='number' name='AlarmDuration' value='$row[AlarmDuration]' 
						style='width:35px; height:17px;' readonly/> min</td></tr>
						<tr><td>Interval
						<input type='number' name='AlarmInterval' value='$row[AlarmInterval]' 
						style='width:35px; height:17px;' readonly/> min</td></tr>
						</table>";
					}
					else
					{
						echo"<table style='width:80px; margin:5; border:0; display:inline;'><tr><td>
						<img src='../controllers/images/devices/" . $DeviceImgPath . "' width='40' height='40' />
						</td></tr><tr><td style='border:0;'>
						<img src='../controllers/images/$additional' height='20' />
						</td></tr></table>";
					}
				}
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
					//NOTIFY BY EMAIL
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<img src='../controllers/images/$NotifyByEmailValue' width='$resul' height='$resul' /></td>";
										
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//					
					//CREATED BY USER
					
						echo "</td>
						<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<div class='tooltip'>
						<span class='tooltiptext'>
						This Task was Created by: <B><i>" . $UWCT_UN . " </i></B> [" . $isAdminValue . "] </span>
						<img src='../controllers/images/users/" . $UWCT_IP . "' 
						width='50' height='50' />
						<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</div></td>";
						
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
					//IS DISABLED / ENABLED
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<img src='../controllers/images/$isDisabledValue' width='35' height='35' /></td>";

//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
					//EDIT TASK
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<a href='EditTask.php?var=$TaskID&referrer=RoomSettings.php?var=$RoomID' style='text-decoration:none;'>
						<img src='../controllers/images/edit4.png' width='30' height='30' /></td>
						</a>
						</tr>";
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
			}
			echo "</table>";
		} 
		else // ($Tasks == NULL)
		{
			echo"<table style='border:0;'><tr>
			<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
			This Room has no Tasks to Display
			</th>
			</tr></table>";
		}
	
	
	
	
	
	
	
	
?>
