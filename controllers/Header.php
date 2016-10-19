<?php
	
	if (isset($_SESSION["UserName"])) 
	{
		echo "
		<div id='page-header'>
		<div class='page-logo'>


		<div class='welcom-name'>Welcome " . $_SESSION["UserName"] . "</div>" .
		"&nbsp;&nbsp;


		<a href='myAccount.php?var=".$_SESSION["UserID"]."' style='text-decoration:none;'>
		<img style='margin-top:57.5px;' width='20px' src='../controllers/images/my-account.png' />
		</a>


		<a href='logout.php' style='text-decoration:none;'>
		<img style='margin-top:57.5px;' width='20px' src='../controllers/images/logout.png' />
		</a>

		
		</div>
		<div class='page-logo2'>
		 <a href='HomePage.php'><img height='80px;' src='../controllers/images/Capture.PNG'/></a>
		</div>
		</div>
		
	   ";  
	}
?>   
