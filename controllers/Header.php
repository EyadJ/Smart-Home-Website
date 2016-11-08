<?php
	require_once("../models/critical.php");

	if (isset($_SESSION["UserName"])) 
	{
		$isSmokeDetectorOn = critical::isSmokeDetectorOn();
		$isHouseParametersBreached = critical::isHouseParametersBreached();
			
		echo "
		<div id='page-header'>
			<div class='website-logo'>
				<a href='HomePage.php'><img width='350px;' src='../controllers/images/Capture.PNG'/></a>
			</div>";
			
			
			if($isSmokeDetectorOn)
			{
				echo "<div class='emergancy-message'>
					<img class='blink' width='80px' src='../controllers/images/Alert-Yellow2.png'/>
					<h2 style='display:inline; position:absolute; margin-left:0px; top:-5px;'>THERE IS A GAS LEAK !</h2><br />
					<h5 style='position:absolute; margin-left:88px; top:24px; padding-right:0px;'>
					The System is in Freeze-Mode, You Can't Switch Devices ON/OFF, the Tasks will be Disabled as well.</h5>
				</div>";
			}
			if($isHouseParametersBreached)
			{
				echo "<div class='emergancy-message' style='width:345px;'>
					<img class='blink' width='80px' src='../controllers/images/Alert-Yellow2.png'/>
					<h2 style='display:inline; position:absolute; margin-left:10px; top:-12px;'>HOUSE &nbsp;&nbsp; PARAMETERS BREACHED</h2>
					
					<a href='../controllers/HouseParametersSetNoRisk.php''>
					<img width='70px' src='../controllers/images/secure.png' style='position:absolute; top:7px; right:8px;'/>
					<h5 style='position:absolute; display:inline; bottom:-18px; right:5px; color:black;'>Risk Gone ?</h5>
					</a>
				</div>";
			}
			
			echo"<div class='user-settings' >
				<div class='welcom-name'>Welcome <b>" . $_SESSION["UserName"] . "</b></div>	&nbsp;&nbsp;

				<a href='notificationCenter.php' style='text-decoration:none;'>
				<img style='margin-top:57.5px;' width='20px' src='../controllers/images/notification.png' />
				</a>
				
				<a href='myAccount.php' style='text-decoration:none;'>
				<img style='margin-top:57.5px;' width='20px' src='../controllers/images/my-account.png' />
				</a>

				<a href='Logout.php' style='text-decoration:none;'>
				<img style='margin-top:57.5px;' width='20px' src='../controllers/images/logout.png' />
				</a>
			</div>
		</div>
		
	   ";  
	}
?>   
