<?php

	//----------------------------------------------------------------------------//
	//include_once("../models/user.php");
	//include_once("../models/room.php");
	//include_once("../models/device.php");
	//include_once("../models/sensor.php");
	//include_once("../models/task.php");

	//$isAdmin = $_SESSION["isAdmin"];
	//$UserID = $_SESSION["UserID"];
	//$RoomID = $_GET["var"];
	
	//^^^^^ALREADY INCLUDED IN (PreRoomSettings.php)- LEFT FOR CONVENIENCE^^^^^^
	//
	//-------------------------------------------	---------------------------------//
	// 
		echo'<form method="post" action="../controllers/UploadNewRoomBgHandling.php?var=' . $RoomID . '" enctype="multipart/form-data">
		<table id="uploadTable" style="display:none; margin-left:auto; margin-right:auto; width:330px;"><tr><th>
				<input type="file" name="fileToUpload" id="my_file" required />
				<input type="submit" class="button"  id="my_submit" value="Upload" />
				</th></tr></table>
				</form>';
				
		$result = room::getAllRoomBackgrounds($RoomID);
		$SelectedRoomImgPath = room::getRoomSelectedBackground($RoomID);
		
			while($row = $result->fetch_assoc()) 
			{
				echo"
				<div style='
				display: inline-block;
				width:270px; 
				margin-right:20px; 
				margin-left:20px;
				visabilty:hidden;
				'>";
			
				if($SelectedRoomImgPath == $row['ImgPath'])
				{
					echo"
					<img src='../controllers/images/Checkmark1.png' 
					width='50px' 
					height='50px'
					style='
					z-index:1;
					position:relative;
					top:237px;
					left:67%;
					'/>";
				}
				else
				{
					echo"
					<a style='text-decoration:none;'
					href='../controllers/ChangeRoomBackground.php?roomID=$RoomID&newBG=$row[ImgPath]' > 
					<img src='../controllers/images/Select-hand3.png' 
					width='50px' 
					height='50px'
					style='
					z-index:1;
					position:relative;
					top:237px;
					left:67%;
					'/>
					</a>";
				}
				
				if(!room::IsBackgroundDefault($RoomID, $row['ImgPath']))
				{
					if($SelectedRoomImgPath != $row['ImgPath'])
					{
						echo"
						<a style='text-decoration:none;'
						href='../controllers/DeleteRoomBackground.php?roomID=$RoomID&newBG=$row[ImgPath]' > 
						<img src='../controllers/images/Delete_Icon2.png' 
						width='50px' 
						height='50px'
						style='
						z-index:1;
						position:relative;
						top:237px;
						right:17%;
						'/>
						</a>";
					}
				}	
				else
				{
					echo"
					<div
					style='
					z-index:1;
					position:relative;
					top:237px;
					right:17%;
					'
					class='tooltip'>
					
					<span class='tooltiptext'>Default (Undeletable)</span>
					<img src='../controllers/images/Delete_Icon-unavailable2.png'
					width='50px' 
					height='50px'
					/>
					</div>";
				}
				
				
				echo"
				<img src='../controllers/images/rooms/".$row['ImgPath']."' 
				style='z-index:2; ' width='240px' height='240px'/>
				</div>
				";
			}
			
			
?>
