 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");

	//
	$isAdmin = $_SESSION["Admin"];
	$UserID = $_GET["var"];
	$AllRooms = Room::getAllRoomsDetails();
	//
	echo "<tr><td>";

	while($row = $AllRooms->fetch_assoc()) 
	{
			
		$RoomID = $row['RoomID'];
		$isAutherised = user::isUserAutherisedForRoom($UserID, $RoomID) ;
		
		$Devices = Device::getDevicesDetailsByRoomID($RoomID);
		
		if($isAutherised)
		{
			echo "<a style='text-decoration:none; color:black;' 
			href='../controllers/UserAuthorisedRoomsHandling.php?var=" . $UserID . "&var2=" . $RoomID . "&var3=unAuthorise' />
			<div id='roomDiv'
			style='
			width:240px; 
			height:305px; 
			display:inline-block; 
			margin-right:2.5px; 
			margin-left:2.5px;
			margin-bottom:5px;
			margin-top:5px;
			border-left: 2px solid black; 
			border-right: 2px solid black; 
			border-bottom: 2px solid black; 
			border-top: 2px solid black;
			'>
			<B>".$row['RoomName']."</B><br />
			<img src='../controllers/images/Checkmark1.png' width='40px' height='40px'
			style='
			z-index:0;
			position:absolute;
			margin-top:0px;
			margin-left:200px;
			'/>";
		}
		else	//!$isAutherised
		{
			echo "<a style='text-decoration:none; color:black;' 
			href='../controllers/UserAuthorisedRoomsHandling.php?var=" . $UserID . "&var2=" . $RoomID . "&var3=Authorise' >
			<div id='roomDiv'
			style='
			width:240px; 
			height:305px; 
			display:inline-block; 
			margin-right:2.5px; 
			margin-left:2.5px;
			margin-bottom:5px;
			margin-top:5px;
			border-left: 2px solid black; 
			border-right: 2px solid black; 
			border-bottom: 2px solid black; 
			border-top: 2px solid black;
			'><B>".$row['RoomName']."</B><br />";
		}
		
		
		
		
		echo "<img src='../controllers/images/rooms/".$row['RoomImgPath']."' width='240px' height='240px'/><br />";
		
	
		while($row2 = $Devices->fetch_assoc()) 
		{
			echo "<img src='../controllers/images/devices/$row2[DeviceImgPath_on]'
				width='40' height='40' />";
		}
			
		echo"</div></a>"  ;		
	}
	echo"</td></tr>";
	
	
	
	
	
	
	
	
	
?>
