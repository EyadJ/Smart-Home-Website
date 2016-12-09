 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");
	include_once("../models/sensor.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	
	if ($isAdmin == TRUE)
	{
		$result = room::getAllRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$result = user::getUserAutherisedRooms($UserID);	
	}

	$counter=0;
	echo "<tr align='center'>";
	
	while($row = $result->fetch_assoc()) 
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
			
			<a href='RoomSettings.php?var=". $RoomID ."' > 
			
			<img src='../controllers/images/settings-icon (1).png' width='40px' height='40px'
			
			style=' z-index:0; position:absolute; margin-top:193px; right:18%;'/></a>
			
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
			
			echo"</td><td style=
			'width:60px; 
			border-right: 2px solid black;
			border-bottom: 2px solid black; 
			border-top: 2px solid black;
			'>";
			
		
			while($row2 = $Devices->fetch_assoc()) 
			{
				if($row2["isVisible"])
				{
					echo "<a style='text-decoration:none;' href='../controllers/switchDeviceStatus.php?DeviceID=$row2[DeviceID]&";
					if($row2['DeviceState'] == 1) // (on)
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
			}
				
			echo"</td>"  ;		
	$counter++;
	}
	echo"</tr>";
?>
