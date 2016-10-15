<?php

	if (isset($_SESSION["FullName"])) 
	{  
		echo "<div class='welcom-name'>Welcome " . $_SESSION["FullName"] .
		"&nbsp</div><a href='logout.php'>
		<img style='margin-top:57.5px;' width='20px' src='../controllers/images/logout.png'</a>";  
	}
	else
	{
		echo  
		"<img src='../controllers/images/login_register_button.png' alt='logo' usemap='#map1'/>
		<map name='map1'> 
		<area shape='rect' coords='0,21,110,55' href='LogIn.php'>
		<area shape='rect' coords='115,24,220,53' href='Registration.php'>
		</map>";
	}
	echo '
	</div>
		<div class="page-logo2">
		<img class="logo" src="../controllers/images/logo.png"/>
		</div>
	';
?>   







