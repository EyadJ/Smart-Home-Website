<?php

	include_once("../models/User.php");
	include_once("../models/Room.php");
	include_once("../models/Device.php");
	//include_once("../models/Sensor.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	
	if ($isAdmin == TRUE)
	{
		$result = Room::getRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$result = User::getUserAutherisedRooms($UserID);	
	}

	while($row = $result->fetch_assoc()) 
	{
			$RoomID = $row['RoomID'];
			//	echo  $RoomID ; 
			$Devices = Device::getDevicesDetailsByRoomID($RoomID);
			
			echo
			"<tr align='center'>
			<td style='width:80;'>
			<B>".$row['RoomName']."</B>
			<br />
			<img src='../controllers/images/rooms/".$row['RoomImgPath']."' width='240' height='240'/>
			</td><td style='width:60px;'>";
			
		
			while($row2 = $Devices->fetch_assoc()) 
			{
				echo "<a style='text-decoration:none;' href='../controllers/switchDeviceStatus.php?DeviceID=$row2[DeviceID]&";
				if($row2['DeviceState'] == 1) // (on)
				{
					echo "newStatus=0'>
							<img src='../controllers/images/devices/$row2[DeviceImgPath_on]'";
				}
				else // == 0 (off)
				{
					echo "newStatus=1'>
							<img src='../controllers/images/devices/$row2[DeviceImgPath_off]'";
				}
				
				echo" width='60' height='60' />
				</a><br />";
			}
			
			echo"</td></tr>"  ;		
	}
?>
