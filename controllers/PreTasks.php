 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/task.php");
	include_once("../models/sensor.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	
	if ($isAdmin == TRUE)
	{
		$roomsResult = Room::getAllRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$roomsResult = User::getUserAutherisedRooms($UserID);	
	}

echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' />";
	
	while($r_Row = $roomsResult->fetch_assoc()) 
	{
			$RoomID = $r_Row['RoomID'];

			$Devices = Device::getDevicesDetailsByRoomID($RoomID);
			
			echo"
			
			<table style='width:110px; margin-left:2.2%;  margin-bottom:-15px; display:inline-block;'>
			<tr align='center'><td>".
			"<B>".$r_Row['RoomName']."</B>
			<br />
			<img src='../controllers/images/rooms/".$r_Row['RoomImgPath'].
			"' style='margin-right:auto; margin-left:auto; width:80px; '/>
			</td></tr></table>
			
			<a href='RoomSettings.php?var=". $RoomID ."' style='text-decoration:none;'> 
			<img src='../controllers/images/edit.png' 
			width='30px' 
			style='
			z-index:0;
			margin-bottom:-15px;
			margin-right:20px;
			'/>
			</a>";
			
		//------------------------------------------------------------------------------------//	
		//------------------------------------------------------------------------------------//	
			
		$Tasks = task::getUserTasksForOneRoom($UserID, $RoomID);
		
		if($Tasks != NULL)
		{
			
			$devices;
			$sensors;
			
			$devices_Original = Device::getDevicesDetailsByRoomID($RoomID);
			$i = 0;
			while($row = $devices_Original->fetch_assoc()) 
			{
				$devices[$i]["DeviceID"] = $row["DeviceID"];
				$devices[$i]["DeviceImgPath_on"] = $row["DeviceImgPath_on"];
				$i++;
			}
			//
			//
			$sensors_Original = Sensor::getSensorsDetailsByRoomID($RoomID);
			$i = 0;
			while($row = $sensors_Original->fetch_assoc()) 
			{
				$sensors[$i]["SensorTypeID"] = $row["SensorTypeID"];
				$sensors[$i]["SensorImgPath"] = $row["SensorImgPath"];
				$sensors[$i]["SensorID"] = $row["SensorID"];
				$i++;
			}




					
			//form and table header	(one task)
			echo"<table id='viewAllTasksTable'>
				<tr style='line-height: 16px;'>
				<th width='10%'>Description</th>
				<th width='8%'>Duration (Minutes)</th>
				<th width='6.5%'>Repeat Daily</th>
				<th width='15%'>Selected Sensor</th>
				<th width='30%'>Selected Device/s Action</th>
				<th width='5%'>Task Enabled</th>
				</tr>";
			

			
			//
			//----------------------------------------------------------//
			//
			//
			// BIG LOOP:
			//
			while ($row = $Tasks->fetch_assoc())
			{
					//$actionTimeValue = "";
					//$actionDateValue = "";
					$RepeatDailyValue = "";
					$isDisabledValue = "";
					$TaskID = $row["TaskID"];
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
					
					if($row["repeatDaily"] == 1)
					{
						$RepeatDailyValue = " checked ";
					}
					
					if($row["isDisabled"] == 1)
					{
						$isDisabledValue = "x-red.png";
					}
					else // if($row["isDisabled"] == 0)
					{
						$isDisabledValue = "Checkmark1.png";
					}

			
			//table body (one task)
			echo"<tr><td><b>$row[TaskName]</b></td>
				
				<td><input type='number' name='Duration_Minute' value='$row[Duration_Minute]' style='width:60px;' required/></td>
				
				<td><input type='checkbox' name='repeatDaily' $RepeatDailyValue />
				<div style='display:inline;'><br />
				<b>Action Date </b><input type='date' name='ActionDate' value = '$row[ActionDate]' />
				</div></td><td>
				";
				
				for ($i = 0; $i < count($sensors); $i++)
				{
					if($selectedSensorID == $sensors[$i]["SensorID"])
					{
						if ($sensors[$i]["SensorTypeID"] == 20)
						{
							echo"<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' /><br />
							<b>Action Time</b>
							<input type='time' name='ActionTime' value = '$row[ActionTime]' />";
						}
						else
						{
							echo"<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' />";
						}
					}
				}
				
				echo "</td><td>";
				
				for ($i = 0; $i < count($devices); $i++)
				{
					$additional = "";
					
					if($taskDevicesArray[$i]["DeviceID"] == $devices[$i]["DeviceID"])
					{
						$var = $taskDevicesArray[$i]["ReqDevState"];
							 if($var ==-1) $additional = "";
						else if($var == 1) $additional = "";
						else if($var == 0) $additional = "";
					}
						
						
					echo"<table style='width:80px; margin:5; border:0; display:inline;'><tr>
					
					<td style='border:0;'>
					<img src='../controllers/images/devices/" . $devices[$i]["DeviceImgPath_on"] . "' width='40' height='40' />
					</td></tr></table>";
				}
					
					
				
						echo "</td>
						<td><img src='../controllers/images/$isDisabledValue' width='40' height='40' /></td>
						</tr>";
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
		echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' />";
	}

	
	
	
	
	
?>
