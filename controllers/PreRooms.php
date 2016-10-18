<?php

	include_once("../models/User.php");
	include_once("../models/Room.php");
	include_once("../models/Device.php");
	//include_once("../models/Sensor.php");

	$isAdmin = $_SESSION["Admin"];
	$UserID = $_SESSION["UserID"];
	
	if ($isAdmin == TRUE)
	{
		$result = Room::getAllRoomsDetails();
	}
	else	//$isAdmin == FALSE (print only rooms which are autherized to some user)
	{
		$result = User::getUserAutherisedRooms($UserID);	
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
			$Devices = Device::getDevicesDetailsByRoomID($RoomID);
			
			echo
			"<td style=
			'width:80; 
			border-left: 2px solid black; 
			border-bottom: 2px solid black; 
			border-top: 2px solid black;
			'>
			<B>".$row['RoomName']."</B>
			<br />
			<img src='../controllers/images/rooms/".$row['RoomImgPath']."' width='240' height='240'/>
			</td><td style=
			'width:60px; 
			border-right: 2px solid black;
			border-bottom: 2px solid black; 
			border-top: 2px solid black;
			'>";
			
		
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
			
			echo"</td>"  ;		
	$counter++;
	}
	echo"</tr>";
?>
