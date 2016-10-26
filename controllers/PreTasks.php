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
			
			$devices = NULL;
			$sensors = NULL;
			
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
			echo"<table id='viewAllTasksTable' style=' border: none;'>
				<tr style='line-height: 16px;'>
				<th width='10%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Description</th>
				<th width='6.5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Repeat Daily</th>
				<th width='15%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Sensor</th>
				<th width='30%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Selected Device/s Action</th>
				<th width='5%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Task Enabled</th>
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
					$RepeatDailyValue = $row["repeatDaily"];
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
				</tr>";
			
			
			//table body (one task)
			echo"<tr><td style='border-bottom: 2px solid black; border-top: 2px solid black;'><b>$row[TaskName]</b></td>
			
				<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
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
				
				
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				for ($i = 0; $i < count($sensors); $i++)
				{
					if($selectedSensorID == $sensors[$i]["SensorID"])
					{
						if ($sensors[$i]["SensorTypeID"] == 20)
						{
							echo"<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' /><br />
							<b>Action Time</b>
							<input type='time' name='ActionTime' value = '$row[ActionTime]' readonly/>";
						}
						else
						{
							echo"<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' />";
						}
					}
				}
				
				echo "</td><td style='border-bottom: 2px solid black; border-top: 2px solid black;'>";
				
				for ($i = 0; $i < count($devices); $i++)
				{
					$additional = "";

					if($taskDevicesArray[$i]["DeviceID"] == $devices[$i]["DeviceID"])
					{
						$var = $taskDevicesArray[$i]["ReqDevState"];
							 if($var == NULL) $additional = "not-available.png";
						else if($var == 1) $additional = "on.png";
						else if($var == 0) $additional = "off.png";
					}
						
						
					echo"<table style='width:80px; margin:5; border:0; display:inline;'><tr>
					<td>
					<img src='../controllers/images/devices/" . $devices[$i]["DeviceImgPath_on"] . "' width='40' height='40' />
					</td></tr><tr><td style='border:0;'>
					<img src='../controllers/images/$additional' height='20' />
					</td></tr></table>";
				}
					
					
				
						echo "</td>
						<td style='border-bottom: 2px solid black; border-top: 2px solid black;'>
						<img src='../controllers/images/$isDisabledValue' width='40' height='40' /></td>
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
