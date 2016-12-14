<?php
	require_once("../models/critical.php");
	require_once("../models/user.php");

	if (isset($_SESSION["UserName"])) 
	{
		$isSmokeDetectorOn = critical::isSmokeDetectorOn();
		$isHouseParametersBreached = critical::isHouseParametersBreached();
		
		$url = $_SERVER['REQUEST_URI'];
		$url = substr($url, strrpos($url, '/') + 1);
		
		echo "
		<div id='page-header'>
			<div class='website-logo'>
				<a href='HomePage.php'><img width='250px;' src='../controllers/images/Capture.PNG'/></a>
			</div>";
			
			if($isSmokeDetectorOn)
			{
				echo "<div class='emergancy-message' style='width:280px;'>
					<img class='blink' width='60px' src='../controllers/images/Alert-Yellow2.png'/>
					<h3 style='display:inline; position:absolute; margin-left:0px; top:-14px;'>THERE IS A GAS LEAK !</h3><br />
					<h6 style='position:absolute; margin-left:72px; top:4px; padding-right:0px;'>
					The System is in Freeze-Mode, You Can't Switch Devices ON/OFF, the Tasks will be Disabled as well.</h6>
				</div>";
			}
			if($isHouseParametersBreached)
			{
				echo "<div class='emergancy-message' style='width:280px;'>
					<img class='blink' width='60px' src='../controllers/images/Alert-Yellow2.png'/>
					<h3 style='display:inline; position:absolute; margin-left:10px; top:-17px;'>HOUSE<br />PARAMETERS<br />BREACHED</h3>
					
					<a href='../controllers/HouseParametersSetNoRisk.php?referrer=" . $url . "'>
					<img width='50px' src='../controllers/images/secure.png' style='position:absolute; top:2px; right:17px;'/>
					<h5 style='position:absolute; display:inline; bottom:-20px; right:5px; color:black;'>Risk Gone ?</h5>
					</a>
				</div>";
			}
			
			echo"<div class='user-settings' >
				<div class='welcome-name'>Welcome <b>" . $_SESSION["UserName"] . "</b></div>	&nbsp;&nbsp;";

				if($_SESSION["isAdmin"] || user::isUserAutherisedForRoom($_SESSION["UserID"], 110))
				{
					echo"<a class='tooltip' href='../views/SecurityCameras.php' style='text-decoration:none;'>
					<span style='right:17px; margin-top:10px;' class='tooltiptext'>Security Cameras</span>
					<img style='margin-top:35px; padding-right:4px;' width='20px' src='../controllers/images/security-camera9.png' />
					</a>";
					
					echo"<a class='tooltip' href='../views/CameraGallery.php' style='text-decoration:none;'>
					<span style='right:17px; margin-top:10px;' class='tooltiptext'>Camera Gallery</span>
					<img style='margin-top:35px; padding-right:3px;' width='20px' src='../controllers/images/gallery6.png' />
					</a>";
				}
				
				if($_SESSION["isAdmin"])
				{
					echo"<a class='tooltip' href='notificationCenter.php' style='text-decoration:none;'>
					<span style='right:17px; margin-top:10px; width:140px;' class='tooltiptext'>Notification Center</span>
					<img style='margin-top:35px; padding-right:3px;' width='20px' src='../controllers/images/notification.png' />
					</a>";
				}			
				
				echo"<a class='tooltip' href='myAccount.php?referrer=" . $url . "' style='text-decoration:none;'>
				<span style='right:17px; margin-top:10px; width:90px;' class='tooltiptext'>My Account</span>
				<img style='margin-top:35px; padding-right:2px;' width='20px' src='../controllers/images/my-account.png' />
				</a>

				<a class='tooltip' href='Logout.php' style='text-decoration:none;'>
				<span style='right:17px; margin-top:10px; width:60px;' class='tooltiptext'>Logout</span>
				<img style='margin-top:35px;' width='20px' src='../controllers/images/logout.png' />
				</a>
			</div>
		</div>
		
	   ";  
	}
?>   
