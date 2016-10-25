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
		
		//
		//----------------------------------------------------------//
		//
		//
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
					$isDisabledValue = " checked ";
				}		
				
				if($row["isDefault"] == 1) //task is undeletable but possible to disable
				{
					$isDefaultValue = "<div class='tooltip'>
					<span class='tooltiptext'>Default (Undeletable)</span>
					<img src='../controllers/images/Delete_Icon-unavailable2.png' width='50px' height='50px'/></div>";
				}
				else //($row["isDefault"] == 0) 
				{
					$isDefaultValue = 
					"<a href = deleteTask.php?var=$TaskID>
					<img src='../controllers/images/Delete_Icon2.png' width='50px' height='50px'/>
					</a>";
				}
				
		//form and table header	(one task)
		echo"<form method='post' action='../controllers/CreateNewTaskHandling.php'>
			<input type='hidden' name='UserID' value='$UserID'/>
			<input type='hidden' name='RoomID' value='$RoomID'/>
			
			<table id='viewTasksTable' width:90%;'><tr>
			<th width='10%'>Description</th>
			<th width='8%'>Duration (Minutes)</th>
			<th width='6.5%'>Repeat Daily</th>
			<th width='25%'>Selected Sensor</th>
			<th width='30%'>Selected Device/s Action</th>
			<th width='6%'>Disable Task</th>
			<th width='7%'>Save Changes</th>
			<th width='9%'>Delete Task</th>
			</tr>";
		
		
		//table body (one task)
		echo"<tr><td><textarea name='TaskName' cols='10' rows='5' style='resize:vertical;'>$row[TaskName]</textarea></td>
			
			<td><input type='number' name='SelectedSensorValue' value='$row[SelectedSensorValue]' style='width:60px;' required/></td>
			
			<td><input type='checkbox' name='repeatDaily' $RepeatDailyValue />
			<div style='display:inline;'><br />
			<b>Action Date </b><input type='date' name='ActionDate' value = '$row[ActionDate]' />
			</div></td><td>
			";
			
			for ($i = 0; $i < count($sensors); $i++)
			{
				$selectedSensortext = "";
				
				if($selectedSensorID == $sensors[$i]["SensorID"])
					$selectedSensortext = "checked";

				if ($sensors[$i]["SensorTypeID"] == 20)
				{
					echo"
					<table style='width:50px; line-height: 50%; border-spacing:0.5; padding:0; margin:1; border:0; display:inline; margin:auto;'>
					
					<tr><td rowspan='2'>
					
					<a href='#' onclick='HideUnhideActionTime(this.childNodes[0].childNodes[0]);' 
					
					style='text-decoration:none; color:black' >
					
					<label><input type='radio' name='sensors' id='clockSensor' value='" . $sensors[$i]["SensorID"] . "' $selectedSensortext/>
					
					<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' /></label></a>
					
					</td><td>Action Time</td></tr>
					
					<tr><td><input type='time' name='ActionTime' value = '$row[ActionTime]' /></td></tr>
					</table>";
				}
				else
				{
					echo"<a  href='#' onclick='HideUnhideActionTime(this.childNodes[0].childNodes[0]);' 
					style='text-decoration:none; color:black' >
					<label><input type='radio' name='sensors' value='$row[SensorID]' $selectedSensortext/>
					<img src='../controllers/images/sensors/" . $sensors[$i]["SensorImgPath"] . "' width='40' height='40' /></label>";
				}

				echo "</a><br />";
			}
			
			echo "</td><td>";
			
			for ($i = 0; $i < count($devices); $i++)
			{
				$option1 = "";
				$option2 = "";
				$option3 = "";
				
				if($taskDevicesArray[$i]["DeviceID"] == $devices[$i]["DeviceID"])
				{
					$var = $taskDevicesArray[$i]["ReqDevState"];
						 if($var ==-1) $option1 = "checked";
					else if($var == 1) $option2 = "checked";
					else if($var == 0) $option3 = "checked";
				}
					
					
				echo"<table style='line-height: 10%; border-spacing:0.5; padding:0; margin:5; border:1;'>
				<tr ><td colspan='2'><label><h5 style='display:inline;'>Don't Change</h5>
				<input type='radio' name='" . $devices[$i]["DeviceID"] . "' value='-1' $option1/></label></td>
				<td rowspan='2' ><img src='../controllers/images/devices/" . $devices[$i]["DeviceImgPath_on"] . "' width='40' height='40' /></td></tr>
				<tr><td><label><h5 style='display:inline;'>ON </h5>
				<input type='radio' name='" . $devices[$i]["DeviceID"] . "' value='1' $option2/></label></td>
				<td ><label><h5 style='display:inline;'>OFF </h5>
				<input type='radio' name='" . $devices[$i]["DeviceID"] . "' value='0' $option3/></label></td></tr></table>";
			}
				
				
			
					echo "</td>
					<td><input type='checkbox' name='isDisabled' id='isDisabled' $isDisabledValue /></td>
					<td style='background-color:#CCCCCC;'><input type='submit' name='SaveChanges' value='Save' /></td>
					<td style='background-color:#CCCCCC;'>
					$isDefaultValue
					</td></tr></table></form>";
		}
	} 
	else // ($Tasks == NULL)
	{
		echo"<br/ ><table style='border:0;'><tr>
		<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
		This Room has no Tasks to Display
		</th>
		</tr></table>";
		
	}
	
	
	
	
	
	
	
	
	
?>
