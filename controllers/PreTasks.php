 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/task.php");
	include_once("../models/sensor.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	$Rooms;
	

	if ($isAdmin == TRUE)
		$Rooms = room::getAllRoomsDetails();
	
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
		$Rooms = user::getUserAutherisedRooms($UserID);	

	//CHECK if this user has authorization of at least one room
	if(isset($Rooms))
	{
		$UsrAthrizdRums = $Rooms;
		
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
		//FILTERS
		
		echo "<br /><b><div id='FiltersDiv' 
		style='	
		display:none; background-color:#CCCCCC; width:300px; height:35px; border: 2px solid black;
		padding:20px; padding-right:2px; bottom:0; left:0; right:0; margin:auto; '>
		
		<div style='display:inline-block; padding-right:20px;'>
		&nbsp;Rooms to Display<br /><select onchange='roomsVisibility(this.value);'>";
		
		//CHECK if there is not aurtorized rooms for this user
	
		while($r_Row = $UsrAthrizdRums->fetch_assoc()) 
		{
			$RoomID = $r_Row['RoomID'];
			$text = "Room" . $RoomID . "";
			
			echo "<option value='$text'>"
			.$r_Row['RoomName']."</option>";
		}
		echo "<option value='0' selected>
		Show All Rooms</option></select></div>";
		
		echo "<div style='display:inline-block;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tasks of User<br />
			<select onchange='usersTasksVisibility(this.value);'>";
			
		$AdminUsers = user::getAdminUsers();
		while($r_Row = $AdminUsers->fetch_assoc()) 
		{
			echo "<option value='TaskOfUser_".$r_Row['UserID']."'>".$r_Row['UserName']."</option>";
		}
		$UsrsWhoCntrlSameRooms = user::getUsersWhoHasControlOfAllRoomsOfThisUser($UserID);
		while($r_Row = $UsrsWhoCntrlSameRooms->fetch_assoc()) 
		{
			echo "<option value='TaskOfUser_".$r_Row['UserID']."'>".$r_Row['UserName']."</option>";
		}
		
		echo "<option value='0' selected>Show All Users</option></select>";	
		//
		echo "</div></div></b><table style='border:1px solid black; background-color:black;'>
		<tr><td style='height:1px; padding:0px; background-color:black;'></td></tr></table>";

	//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
				//GETTING DATA AGAIN FROM THE DATABASE
		if ($isAdmin == TRUE)
		{
			$roomsResult = room::getAllRoomsDetails();
		}
		else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
		{
			$roomsResult = user::getUserAutherisedRooms($UserID);	
		}
		
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
			//THIS IS EXTERNAL LOOP (BIGGEST LOOP) THIS IS THE ROOMS LOOP, AND INSIDE EACH ROOM THERE IS TASKS LOOP (THE INSIDE LOOP)
			
		while($r_Row = $roomsResult->fetch_assoc()) 
		{
				$RoomID = $r_Row['RoomID'];
				$text = "Room" . $RoomID . "";
				
				echo
				"<span id='$text' class='roomDiv'>
				<table style='width:145px; margin-left:2.2%; margin-bottom:-15px; display:inline-block;'>
				<tr align='center'><td width='145px'>".
				"<B>".$r_Row['RoomName']."</B>
				<br />
				
				<img src='../controllers/images/rooms/".$r_Row['RoomImgPath'].
				"' style='margin-right:auto; margin-left:auto; width:80px; '/>
				
				<a href='RoomSettings.php?RoomID=". $RoomID ."' style='text-decoration:none;'> 
				<img src='../controllers/images/edit.png' width='35px' class='room_settings_icon' 
				style='z-index:0; margin-bottom:-8px; margin-right:-10px; display:absolute; border: 3px solid gray; border-radius:15px;'/>
				
				</a></td></tr></table>";
				
			//------------------------------------------------------------------------------------//	
			//------------------------------------------------------------------------------------//	
				
			$Tasks = task::getAllUsersEnabledTasksForOneRoom($RoomID);
			
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
					$devices[$i]["isVisible"] = $row["isVisible"];
					
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
					$sensors[$sensorID]["SensorName"] = $row["SensorName"];
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
					<tr style='line-height: 16px;' id='TasktableHeader'>
					<th width='10%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Name</th>
					<th width='6.5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Repeat Daily</th>
					<th width='15%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Sensor</th>
					<th width='30%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Device/s Action</th>
					<th width='3%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Notify By Message</th>
					<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Created By</th>
					<!--<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Enabled</th>-->
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
						$isDisabled = $row["isDisabled"];
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
						if($isDisabled == 1)
						{
							$isDisabledValue = "x-red.png";
						}
						else // if($isDisabled == 0)
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
					<td style='border:0px;'><!--<td style='border:0px;'></td>-->
					</tr>";
				
				
				//table body (one task) "ALL OF THE FOLLOWING"
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
					//TASK NAME
				
				echo"<tr class='taskDiv $text' id='task_tr'>
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
					$SensorName = $sensors[$selectedSensorID]["SensorName"];
					$sensorImgPath = $sensors[$selectedSensorID]["SensorImgPath"];
					
					$width = ""; if($sensorTypeID == 12) $width = "width:150px;"; else if($sensorTypeID == 20) $width = "width:70px;";
					
					echo"<div class='tooltip'>
					<span class='tooltiptext' style='$width'>$SensorName</span>
					
					<img src='../controllers/images/sensors/$sensorImgPath' width='40' height='40' />
					
					<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-3px; right:-3px;'/>
					</div>";
					
					if ($sensorTypeID == 10 || $sensorTypeID == 15) //Motion or IR
					{
						if($SelectedSensorValue == -1) //Action on Detection
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
						$isVisible = $devices[$i]["isVisible"];
				
						if($DeviceName === "Security Camera")
							$ReqDevState = $taskCamerasArray[$CurrentDevID]["ReqDevState"];
						else
							$ReqDevState = $taskDevicesArray[$CurrentDevID]["ReqDevState"];
						
						
						if($ReqDevState == -1) $additional = "not-available.png";
						else if($ReqDevState == 0) $additional = "off.png";
						else if($ReqDevState == 1) $additional = "on.png";
						
						if($isVisible)
						{
							if($DeviceName === "Alarm" && $ReqDevState == 1)	//ALARM
							{
								echo"<table class='device_table'
								onmouseover='showAlarmDetails(this.nextSibling.nextSibling);' 
								onmouseout='hideAlarmDetails(this.nextSibling.nextSibling);' 
								style='width:80px; border:0; display:inline;'>
								<tr><td>
								<img src='../controllers/images/devices/" . $DeviceImgPath . "' width='40px' height='40px' class='device_img'/>
								<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
								</td></tr><tr><td style='border:0;'>
								<img src='../controllers/images/$additional' height='20px' class='device_status'/>
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
								
								echo"<table class='device_table' 
								onmouseover='showCameraDetails(this.nextSibling.nextSibling);' 
								onmouseout='hideCameraDetails(this.nextSibling.nextSibling);' 
								style='width:80px; border:0; display:inline;'>
								<tr><td>
								<img src='../controllers/images/devices/" . $DeviceImgPath . "' width='40px' height='40px' class='device_img'/>
								<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
								</td></tr><tr><td style='border:0;'>
								<img src='../controllers/images/$additional' height='20px' class='device_status'/>
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
									echo "Take Video <input type='text' value='$TakeVideo' style='width:40px; height:17px;' readonly/> Minutes</td></tr>";
								
								echo"<tr><td>Resolution
								<input type='text' value='" . $Resolution . "p'
								style='width:40px; height:17px;' readonly/></td></tr>
								</table>";
							}
							else
							{
								echo"<table class='device_table' style='width:80px; border:0; display:inline;'><tr><td>
								<img src='../controllers/images/devices/" . $DeviceImgPath . "' width='40px' height='40px' class='device_img'/>
								</td></tr><tr><td style='border:0;'>
								<img src='../controllers/images/$additional' height='20px' class='device_status'/>
								</td></tr></table>";
							}
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
						/*	
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
							*/
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
						//EDIT TASK
							
							echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
						
							$IsUserWhoCreatedTaskSystemAdmin = user::isUserWhoCreatedTaskSystemAdmin($TaskID);
							$isUserSystemAdmin = user::isSystemAdmin($UserID);
							
							//multiple CHECKs
							//if the current user is System Admin, OR if the current user created the task, OR if the task was not creadted by System Admin and the current user is Admin
							if($isUserSystemAdmin || $UserID == $UWCT_UID || (!$IsUserWhoCreatedTaskSystemAdmin && $isAdmin))		
							{
								echo"<a href='EditTask.php?var=$TaskID&referrer=Tasks.php' style='text-decoration:none;'>
								<img src='../controllers/images/edit4.png' width='30px' height='30px' /></a>";
							}
							else
							{
								if($IsUserWhoCreatedTaskSystemAdmin && $isAdmin) //if the task was creadted by System Admin and the current user is Admin
								{
									if($isDisabled)
									{
										echo"<div class='tooltip'>
										<span class='tooltiptext' style='width:80px;'>Click to Enable</span>
										
										<a href='../controllers/EnableOrDisableTaskHandling.php?var=$TaskID&referrer=Tasks.php' style='text-decoration:none;'>
										<img src='../controllers/images/task-disabled.png' height='20px' /></a>
										
										<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-12px; right:1px;'/>
										</div>";
									}
									else // Enabled
									{
										echo"<div class='tooltip'>
										<span class='tooltiptext' style='width:80px;'>Click to Disable</span>
										
										<a href='../controllers/EnableOrDisableTaskHandling.php?var=$TaskID&referrer=Tasks.php' style='text-decoration:none;'>
										<img src='../controllers/images/task-enabled.png' height='20px' /></a>
										
										<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-12px; right:1px;'/>
										</div>";
									}
								}
								else // normal user (not Admin)
								{
									echo"<div class='tooltip'>
									<span class='tooltiptext'>You can&#39;t edit this task</span>
									<img src='../controllers/images/edit-not-available.png' width='20px' height='20px' />
									<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-12px; right:1px;'/>
									</div>";
								}
							}
							echo "</td></tr>";
							
	//--------------------------------------------------------------------END OF ONE TASK--------------------------------------------------------------------//						
				}
				echo "</table>";
//--------------------------------------------------------------------END OF ONE ROOM--------------------------------------------------------------------//						
			} 
			else // ($Tasks == NULL)
			{
				echo"<table style='border:0;'><tr>
				<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
				This Room has no <u>Active</u> Tasks to Display
				</th>
				</tr></table>";
			}
			
			
			
			
			echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' /></span>";
		}
	}
	else // ($Rooms == NULL)
	{
			echo"<table style='border:0;'><tr>
			<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
			You don't have authorization on any room, please contact the admin.
			</th>
			</tr></table>";
	}
	
	
	
	
	
?>
