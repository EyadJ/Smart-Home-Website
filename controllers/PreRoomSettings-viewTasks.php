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
	

//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
		
		$Tasks = task::getAllUsersTasksForOneRoom($RoomID);
		
		if($Tasks != NULL)
		{

//--------------------Store Users, Devices And Sensors in arrays in order to increase the system's performance---------------------//
	
			$devices = NULL;
			$sensors = NULL;
			
			$devices_Original = device::getDevicesDetailsByRoomID($RoomID);

			$i = 0;
			while($row = $devices_Original->fetch_assoc()) 
			{
				$devices[$i]["DeviceID"] = $row["DeviceID"];
				$devices[$i]["DeviceImgPath_on"] = $row["DeviceImgPath_on"];
				$devices[$i]["DeviceName"] = $row["DeviceName"];
				
				$i++;
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
					$TaskCreationDate = $row["DateCreated"];
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
					$taskDevicesArray;
					//
					while ($DeviceRow = $taskDevices->fetch_assoc())
					{
						$taskDevicesArray[$DeviceRow["DeviceID"]]["ReqDevState"] = $DeviceRow["RequiredDeviceStatus"];
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
				//SENSORS
				
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
						<input type='text' name='MotionValue' value = '$SelectedSensorValue' 
						style='width:30px;' readonly/> Minutes";
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
					$ReqDevState = -1;
					$additional = "";
					$CurrentDevID = $devices[$i]["DeviceID"];
					$DeviceName = $devices[$i]["DeviceName"];
					$DeviceImgPath = $devices[$i]["DeviceImgPath_on"];
			
					if($DeviceName === "Security Camera")
						$ReqDevState = $taskCamerasArray[$CurrentDevID]["ReqDevState"];
					else
						$ReqDevState = $taskDevicesArray[$CurrentDevID]["ReqDevState"];
					
					
					if($ReqDevState == -1) $additional = "not-available.png";
					else if($ReqDevState == 0) $additional = "off.png";
					else if($ReqDevState == 1) $additional = "on.png";
					
					
					if($DeviceName === "Alarm" && $ReqDevState == 1)	//ALARM
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
						<input type='number' value='$row[AlarmDuration]' 
						style='width:35px; height:17px;' readonly/> min</td></tr>
						<tr><td>Interval
						<input type='number' value='$row[AlarmInterval]' 
						style='width:35px; height:17px;' readonly/> min</td></tr>
						</table>";
					}
					else if($DeviceName === "Security Camera" && $ReqDevState == 1)		//CAMERA
					{
						$Resolution = $taskCamerasArray[$CurrentDevID]["Resolution"];
						
						echo"<table 
						onmouseover='showCameraDetails(this.nextSibling.nextSibling);' 
						onmouseout='hideCameraDetails(this.nextSibling.nextSibling);' 
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
						width:155px; border:0; padding:0; margin:0; position:absolute; 
						display:none; background-color:#CCCCCC; z-index:2; font-size:11px;
						'>
						<tr><td>";
						
						$TakeImage = $taskCamerasArray[$CurrentDevID]["TakeImage"];
						$TakeVideo = $taskCamerasArray[$CurrentDevID]["TakeVideo"];
						
						if($TakeImage != -1)	//takeImage selected
							echo "Take <input type='text' value='$TakeImage' style='width:30px; height:17px;' readonly/> Picture/s</td></tr>";
						
						else	//takeVideo selected
							echo "Take Video <input type='text' value='$TakeVideo' style='width:40px; height:17px;' readonly/> Seconds</td></tr>";
						
						echo"<tr><td>Resolution
						<input type='text' value='" . $Resolution . "p'
						style='width:40px; height:17px;' readonly/></td></tr>
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
						This Task was Created by: <B><i>" . $UWCT_UN . " </i></B> [" . $isAdminValue . "] 
						<br />Creation Date: <h5 style='display:inline;'><u>" . $TaskCreationDate . "</u></h5></span>	
						<img src='../controllers/images/users/" . $UWCT_IP . "' 
						width='50' height='50' />
						<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</div></td>";
						
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
						//IS DISABLED / ENABLED
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<img src='../controllers/images/$isDisabledValue' width='35' height='35' 
						onmouseover='ShowEnableTaskOnTime(this.nextSibling);' 
						onmouseout='HideEnableTaskOnTime(this.nextSibling);' />";
						
						$EnableTaskOnTime = $row["EnableTaskOnTime"];
						$DisableTaskOnTime = $row["DisableTaskOnTime"];
						
						if($EnableTaskOnTime != NULL || $DisableTaskOnTime != NULL)
						{
							echo"<table style='
							width:180px; border:0; padding:0; margin:0; position:absolute; 
							background-color:#CCCCCC; z-index:2; font-size:11px; display:none;' >";
							
							if($EnableTaskOnTime != NULL)
							{
								echo "<tr><td>Enable Task on
								<input type='time' value='$EnableTaskOnTime' 
								style='width:80px; height:17px;' readonly/></td></tr>";
								
							}
							if($DisableTaskOnTime != NULL)
							{
								echo "<tr><td>Disable Task on
								<input type='time' value='$DisableTaskOnTime' 
								style='width:80px; height:17px;' readonly/></td></tr>";
							}
							echo"</table>
								<img src='../controllers/images/info.png' style='width:12px; height:12px; margin-bottom:25px; margin-left:-11px;'/>
								</td>";
						}
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
					//EDIT TASK
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
					
						//if the current user is an admin or if he is the one who created the task
						if($isAdmin || $UserID == $UWCT_UID)		
							echo"<a href='EditTask.php?var=$TaskID&referrer=RoomSettings.php?var=$RoomID' style='text-decoration:none;'>
							<img src='../controllers/images/edit4.png' width='30' height='30' /></a>";
						else
							echo"<img src='../controllers/images/edit-not-available.png' width='20' height='20' />";
						
						echo "</td></tr>";
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
