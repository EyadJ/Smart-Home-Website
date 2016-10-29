 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/task.php");
	include_once("../models/sensor.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	$roomsResult;
	
	if ($isAdmin == TRUE)
	{
		$roomsResult = Room::getAllRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$roomsResult = user::getUserAutherisedRooms($UserID);	
	}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
		//FILTERS
		
	echo "<br /><b><div id='FiltersDiv' 
	style='	
	display:none;
	background-color:#CCCCCC;
	width:285px;
	height:35px;
	border: 2px solid black;
	padding:20px;
	bottom:0;
	top:0;
	left:0;
	right:0;
	margin:auto;
	'>
	<div style='display:inline-block; padding-right:20px;'>
	&nbsp;Rooms to Display<br /><select onchange='roomsVisibility(this.selectedIndex.value);'>";
	
	$UsrAthrizdRoms = $roomsResult;
	while($r_Row = $UsrAthrizdRoms->fetch_assoc()) 
	{
		$RoomID = $r_Row['RoomID'];
		echo "<option value='".$RoomID."'>"
		.$r_Row['RoomName']."</option>";
	}
	echo "<option value='0' selected>
	Show All Rooms</option></select></div>";
	
	echo "<div style='display:inline-block;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tasks of User<br /><select>";
	$AdminUsers = user::getAdminUsers();
	while($r_Row = $AdminUsers->fetch_assoc()) 
	{
		echo "<option value='".$r_Row['UserID']."'>".$r_Row['UserName']."</option>";
	}
	$UsrsWhoCntrlSameRooms = user::getUsersWhoHasControlOfAllRoomsOfThisUser($UserID);
	while($r_Row = $UsrsWhoCntrlSameRooms->fetch_assoc()) 
	{
		echo "<option value='".$r_Row['UserID']."'>".$r_Row['UserName']."</option>";
	}
	
	echo "<option value='0' selected>Show All Users</option></select>";	
	//
	echo "</div></div></b><br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' />";

//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
			//GETTING DATA AGAIN FROM THE DATABASE
	if ($isAdmin == TRUE)
	{
		$roomsResult = Room::getAllRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$roomsResult = user::getUserAutherisedRooms($UserID);	
	}
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
		//THIS IS EXTERNAL LOOP (BIGGEST LOOP) THIS IS THE ROOMS LOOP, AND INSIDE EACH ROOM THERE IS TASKS (THE INSIDE LOOP)
		
	while($r_Row = $roomsResult->fetch_assoc()) 
	{
			$RoomID = $r_Row['RoomID'];

			echo"<span id=$RoomID class='roomDiv'>
			<table style='width:135px; margin-left:2.2%;  margin-bottom:-15px; display:inline-block;'>
			<tr align='center'><td>".
			"<B>".$r_Row['RoomName']."</B>
			<br />
			<img src='../controllers/images/rooms/".$r_Row['RoomImgPath'].
			"' style='margin-right:auto; margin-left:auto; width:80px; '/>
			</td></tr></table>
			
			<a href='RoomSettings.php?var=". $RoomID ."' style='text-decoration:none;'> 
			<img src='../controllers/images/edit.png' 
			width='30px' 
			style=
			'
			z-index:0;
			margin-bottom:-15px;
			margin-right:20px;
			'/>
			</a>";
			
		//------------------------------------------------------------------------------------//	
		//------------------------------------------------------------------------------------//	
			
		$Tasks = task::getAllUsersTasksForOneRoom($RoomID);
		
		if($Tasks != NULL)
		{

//--------------------Store Users, Devices And Sensors in arrays in order to increase the system's performance---------------------//
	
			$devices = NULL;
			$sensors = NULL;
			
			$devices_Original = Device::getDevicesDetailsByRoomID($RoomID);

			while($row = $devices_Original->fetch_assoc()) 
			{
				$devices[$row["DeviceID"]]["DeviceImgPath_on"] = $row["DeviceImgPath_on"];
			}
			//
			//
			$sensors_Original = Sensor::getSensorsDetailsByRoomID($RoomID);

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
				<th width='10%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Description</th>
				<th width='6.5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Repeat Daily</th>
				<th width='15%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Sensor</th>
				<th width='30%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Device/s Action</th>
				<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Created By</th>
				<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Enabled</th>
				</tr>";
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//			
			
			//
			// BIG LOOP:
			//
			while ($row = $Tasks->fetch_assoc())
			{
					//$actionTimeValue = "";
					//$actionDateValue = "";
					$RepeatDailyValue = $row["repeatDaily"];
					$isDisabledValue = "";
					$TaskID = $row["TaskID"];
					$UWCT_UID = $row["UserID"];		//UserWhoCreatedTask_UserID
					$UWCT_UN = $AllUsersArray[$UWCT_UID]["UserName"];		//UserWhoCreatedTask_UserName
					$UWCT_IP = $AllUsersArray[$UWCT_UID]["UserImagePath"];		//UserWhoCreatedTask_ImagePath

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

					/*	(Apparently there was no need for those checks, just assign the value directly)
					
					if($row["ActionTime"] != NULL)
					{
						$actionTimeValue = " value = '$row[ActionTime]' ";
					}
					
					if($row["ActionDate"] != NULL)
					{
						$actionDateValue = " value = '$row[ActionDate]' ";
					}
					*/
					
					if($row["isDisabled"] == 1)
					{
						$isDisabledValue = "x-red.png";
					}
					else // if($row["isDisabled"] == 0)
					{
						$isDisabledValue = "Checkmark1.png";
					}

			
			echo "<tr style='border:0px; background-color:white; height:17px;'>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				</tr>";
			
			
			//table body (one task) "ALL OF THE FOLLOWING"
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
				//TASK NAME

			echo"<tr><td style='border-bottom: 2px solid black; border-top: 2px solid black;'><b>$row[TaskName]</b></td>
			
				<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//				
				//REPEAT DAILY
				
				if($RepeatDailyValue == 0)
				{
					echo "<img src='../controllers/images/NoRepeatDaily.png' width='30' height='30' />
					<div style='display:inline;'><br />
					<b>Action Date </b><input type='date' name='ActionDate' value = '$row[ActionDate]' 
					style='width:130px;' readonly/></div>";
				}
				else if ($RepeatDailyValue == 1)
				{
					echo "<img src='../controllers/images/Checkmark1.png' width='30' height='30' />";
				}
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//
				//SENSOR
				
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				if ($sensors[$selectedSensorID]["SensorTypeID"] == 20)
				{
					echo"<img src='../controllers/images/sensors/" . $sensors[$selectedSensorID]["SensorImgPath"] . "' width='40' height='40' /><br />
					<b>Action Time</b>
					<input type='time' name='ActionTime' value = '$row[ActionTime]' readonly/>";
				}
				else
				{
					echo"<img src='../controllers/images/sensors/" . $sensors[$selectedSensorID]["SensorImgPath"] . "' width='40' height='40' />";
				}
				
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//			
				//DEVICES
					
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				for ($i = 0; $i < count($devices); $i++)
				{
					$CurrentDevID = $taskDevicesArray[$i]["DeviceID"];
					$additional = "";
					$ReqDevState = $taskDevicesArray[$i]["ReqDevState"];
					
					if($ReqDevState == NULL) $additional = "not-available.png";
					else if($ReqDevState == 1) $additional = "on.png";
					else if($ReqDevState == 0) $additional = "off.png";
						
					echo"<table style='width:80px; margin:5; border:0; display:inline;'><tr><td>
					<img src='../controllers/images/devices/" . $devices[$CurrentDevID]["DeviceImgPath_on"] . "' width='40' height='40' />
					</td></tr><tr><td style='border:0;'>
					<img src='../controllers/images/$additional' height='20' />
					</td></tr></table>";
				}
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//					
					//CREATED BY USER
					
						echo "</td>
						<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<div class='tooltip'>
						<span class='tooltiptext'>
						This Task was Created by: (User) <B><i>" . $UWCT_UN . "
						</i></B></span>
						<img src='../controllers/images/users/" . $UWCT_IP . "' 
						width='50' height='50' />
						</div></td>";
						
//--------------------------------------------------------------------------------------------------------------------------------------------------------------//						
					//IS DISABLED / ENABLED
						
						echo "<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<img src='../controllers/images/$isDisabledValue' width='40' height='40' /></td>
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
		echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' /></span>";
	}

	
	
	
	
	
?>
