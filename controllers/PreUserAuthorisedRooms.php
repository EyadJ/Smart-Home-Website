 <?php

	include_once("../models/user.php");
	include_once("../models/room.php");
	include_once("../models/device.php");

	//
	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_GET["var"];
	$AllRooms = room::getAllRoomsDetails();
	//
	
	//check if $_GET["var"] was manuplated and changed to a wrong user id or other admin's ID
	if(!user::isUserExists($UserID) || user::isAdmin($UserID))
		header("Location:../views/Rooms.php");
	
	//User Image Path
	$UserImagePath = user::getUserImagePath($UserID);
	$UserName = user::getUserName($UserID);
	
	echo "<span align='center'>
			<img src='../controllers/images/users/$UserImagePath' 
			style='width:110px; height:110px;display:block; left: 0; right: 0; margin: auto; border: 1px solid black;'/>
			<p align='center' style='margin-top:2px;'>$UserName</p>
			</span>";
	//---------------
	
	echo "<table style='background-color:white; border:0px solid transparent;'> 
			<tr><td>";

	while($row = $AllRooms->fetch_assoc()) 
	{
		$RoomID = $row['RoomID'];
		$isAutherised = user::isUserAutherisedForRoom($UserID, $RoomID) ;
		
		$Devices = device::getDevicesDetailsByRoomID($RoomID);
		
		if($isAutherised)
		{
			if(user::isUserHaveTaskInThisRoom($UserID, $RoomID))
			{
				echo "
				<a><div class='roomDiv'
				style='
				width:240px; height:305px; display:inline-block; padding-right:5px; padding-left:5px;			
				margin-right:2.5px; margin-left:2.5px; margin-bottom:5px; margin-top:5px; border-left: 2px solid black; 
				border-right: 2px solid black; border-bottom: 2px solid black; border-top: 2px solid black;'>
				
				<B>".$row['RoomName']."</B><br />
				
				<div class='tooltip' style='z-index:0; position:absolute; margin-top:0px; margin-left:200px;'>
				<span class='tooltiptext' style=' width:110px;'>This user has task/s in this room, Please delete them first</span>
				
				<img src='../controllers/images/Checkmark1.png' width='40px' height='40px'
				/>
				
				<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:-1px; right:-2px;'/>
				</div>";
			}
			else // isUserHaveTaskInThisRoom == FALSE
			{
				echo "<a style='text-decoration:none; color:black;' 
				href='../controllers/UserAuthorisedRoomsHandling.php?var=" . $UserID . "&var2=" . $RoomID . "&var3=unAuthorise' />
				<div class='roomDiv'
				style='
				width:240px; height:305px; display:inline-block; padding-right:5px; padding-left:5px;			
				margin-right:2.5px; margin-left:2.5px; margin-bottom:5px; margin-top:5px; border-left: 2px solid black; 
				border-right: 2px solid black; border-bottom: 2px solid black; border-top: 2px solid black;'>
				
				<B>".$row['RoomName']."</B><br />
				<img src='../controllers/images/Checkmark1.png' width='40px' height='40px'
				style='z-index:0; position:absolute; margin-top:0px; margin-left:200px; '/>";
				
			}
		}
		else	// $isAutherised == FALSE
		{
			echo "<a style='text-decoration:none; color:black;' 
			href='../controllers/UserAuthorisedRoomsHandling.php?var=" . $UserID . "&var2=" . $RoomID . "&var3=Authorise' >
			<div class='roomDiv'
			style='width:240px; height:305px; display:inline-block; padding-right:5px; padding-left:5px;
			margin-right:2.5px; margin-left:2.5px; margin-bottom:5px; margin-top:5px; border-left: 2px solid black; 
			border-right: 2px solid black; border-bottom: 2px solid black; border-top: 2px solid black;
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
	echo"</td></tr></table>";
	
?>
