<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Homepage</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
</head>
<body>
 
            <div class="allcontainer">
			<img src="../controllers/images/smarthome-background.jpg" 
			style="width:100%; position:fixed; top:40px;" /> 

<?php
include_once("../controllers/Header.php");
?> 

	<div id='page-container'>
	 <div class='menu'>
	<ul class='ui-menu'>
<?php
	require_once("../controllers/PrintSideMenu.php");
	
	echo (PrintSideMenu::autoPrint(basename(__FILE__)));
?>
				</ul>
				</div>
         
	</div>

</body>
</html>

