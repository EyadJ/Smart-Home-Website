<?php
	if (isset($_SESSION["UserName"])) 
	{  
	   echo "<div class='welcom-name'>Welcome " . $_SESSION["UserName"] .
	   "&nbsp</div><a href='logout.php'>
	   <img style='margin-top:57.5px;' width='20px' src='../controllers/images/logout.png'</a>";  
	}
?>   
