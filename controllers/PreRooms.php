 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/sensor.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	$Rooms;
	
	if ($isAdmin == TRUE)
		$Rooms = room::getAllRoomsDetails();
		
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
		$Rooms = user::getUserAutherisedRooms($UserID);

	//CHECK if there is not aurtorized rooms for this user
	if(isset($Rooms))
	{
		$counter=0;
		echo "<tr align='center'>";
		
		while($row = $Rooms->fetch_assoc()) 
		{
			if($counter>1)
			{
				echo "</tr><tr align='center' >";
				$counter=0;
			}
			
				$RoomID = $row['RoomID'];
				//	echo  $RoomID ; 
				$Devices = device::getDevicesDetailsByRoomID($RoomID);
				
				echo
				"<td style=
				'width:80px; 
				height:250px; 
				border-left: 2px solid black; 
				border-bottom: 2px solid black; 
				border-top: 2px solid black;
				
				'>
				<B style='background-color:#E6E6E6; border-radius:6px; padding:3px;'>"
				.$row['RoomName']."</B>
				<br />
				
				<div style='width:240px; margin-right:auto; margin-left:auto;'>
				
				<a href='RoomSettings.php?RoomID=". $RoomID ."' > 
				
				<img src='../controllers/images/settings-icon (1).png' width='40px' height='40px' class='room_settings_icon'
				
				style=' z-index:0; position:absolute; margin-top:193px; right:18%; background-color:white; border:1px solid gray;
				border-top-right-radius: 25px; border-top-left-radius: 20px; 
				border-bottom-left-radius: 25px; border-bottom-right-radius: 8px;'/></a>
				
				<img src='../controllers/images/rooms/".$row['RoomImgPath']."' width='240px' height='240px'/>
				</div>";
				
				//--------------------------------------------Room Temperature--------------------------------------------------//
				$TempSensorValue = sensor::getTempSensorByRoomID($RoomID);
				
				if($TempSensorValue != NULL)	//CHECK if there is a temperature sensor in this room or not
				{
					echo"<div style='width:40px; height:40px; position:absolute; top:40px; right:18%;'>
					
					<img src='../controllers/images/sensors/temperature-sensor4.png' width='40px' height='40px'/>
					
					<div style=' position:absolute; width:21px; height:18px; margin-top:-44px; left:25px; 
					background-color:#FFB240; border-radius:25px; font-size:12px; font-weight:700;'>&deg;$TempSensorValue</div>
					
					</div>";
				}
				//--------------------------------------------------------------------------------------------------------------//
				//
				//
				//--------------------------------------------Water Tank--------------------------------------------------//
				
				if($RoomID == 110)	//CHECK if this is the room (outside the house) that has the water tanks
				{
					$waterTankLevel = sensor::getWaterTankLevel();
					
					$WaterLevelTextColor = "";
					
					//Very Low Water Level
					if($waterTankLevel <= 30) 
						$WaterLevelTextColor = "color:red;";
					
					// Good Water Level
					else if($waterTankLevel >= 80) 
						$WaterLevelTextColor = "color:#009933;";
		
					//Normal Water Level
					else
						$WaterLevelTextColor = "color:#666666;";
		
					echo"<div style='width:40px; height:40px; position:absolute; top:50px; right:25%;'>
					
					<img src='../controllers/images/water-tank.png' height='40px'/>
					
					<div style=' position:absolute; width:28px; height:19px; margin-top:-33px; right:-12px; 
					border-radius:25px; font-size:11px; font-weight:900; $WaterLevelTextColor'>$waterTankLevel%</div>
					
					</div>";
				}
				//---------------------------------------------------------------------------------------------------------//
				
				echo"</td><td style=
				'width:60px; 
				border-right: 2px solid black;
				border-bottom: 2px solid black; 
				border-top: 2px solid black;
				'>";
				
			
				while($row2 = $Devices->fetch_assoc()) 
				{
					$DeviceName = $row2["DeviceName"];
					$DeviceState = $row2["DeviceState"];
					
					if($row2["isVisible"])
					{
						$RemainingSeconds = device::lastRunningTimeOfAC($row2["DeviceID"]);
						
						if(
						($DeviceName != "AC") || 
						($DeviceName === "AC" && $DeviceState == 1) || 
						($DeviceName === "AC" && $DeviceState == 0 && $RemainingSeconds == 0)
						)
						{
							echo "<a style='text-decoration:none;' href='../controllers/switchDeviceStatus.php?DeviceID=$row2[DeviceID]&";
							
							if($DeviceState == 1) // (on)
							{
								echo "newStatus=0'><div class='DeviceDiv' >
										<img src='../controllers/images/devices/$row2[DeviceImgPath_on]'";
							}
							else // == 0 (off)
							{
								echo "newStatus=1'><div class='DeviceDiv' >
										<img src='../controllers/images/devices/$row2[DeviceImgPath_off]'";
							}
							echo" width='60' height='60' style='margin-bottom:5px;'/>
							</div></a>";
						}
						else	//Device == AC && $DeviceState == 0 && $RemainingSeconds > 0
						{
							echo "<div class='tooltip'>
									<span class='tooltiptext' style='font-size:10px; visibility:visible; margin-top:-10px;'>
									Please wait (<b><span id='AC_countDown_ID' class='AC_countDown'>" . $RemainingSeconds . 
									"</span></b>) Seconds to Turn the (AC) ON
									</span>
									<img src='../controllers/images/devices/$row2[DeviceImgPath_off]' 
									width='60' height='60' style='margin-bottom:5px;' />
								</div>";
						}
					}
				}
				echo"</td>"  ;		
					
		$counter++;
		}
		echo"</tr>";
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
