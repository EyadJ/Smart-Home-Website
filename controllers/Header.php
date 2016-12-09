<?php
	require_once("../models/critical.php");

	if (isset($_SESSION["UserName"])) 
	{
		$isSmokeDetectorOn = critical::isSmokeDetectorOn();
		$isHouseParametersBreached = critical::isHouseParametersBreached();
			
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
					
					<a href='../controllers/HouseParametersSetNoRisk.php''>
					<img width='50px' src='../controllers/images/secure.png' style='position:absolute; top:2px; right:17px;'/>
					<h5 style='position:absolute; display:inline; bottom:-20px; right:5px; color:black;'>Risk Gone ?</h5>
					</a>
				</div>";
			}
			
			$url = $_SERVER['REQUEST_URI'];
			echo"<div class='user-settings' >
				<div class='welcome-name'>Welcome <b>" . $_SESSION["UserName"] . "</b></div>	&nbsp;&nbsp;

				<a href='notificationCenter.php' style='text-decoration:none;'>
				<img style='margin-top:35px;' width='20px' src='../controllers/images/notification.png' />
				</a>
				
				<a href='myAccount.php?referrer=" . substr($url, strrpos($url, '/') + 1) . "' style='text-decoration:none;'>
				<img style='margin-top:35px;' width='20px' src='../controllers/images/my-account.png' />
				</a>

				<a href='Logout.php' style='text-decoration:none;'>
				<img style='margin-top:35px;' width='20px' src='../controllers/images/logout.png' />
				</a>
			</div>
		</div>
		
	   ";  
	}
?>   
