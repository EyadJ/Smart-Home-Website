<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Rooms</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
</head>
<body>
 
            <div class="allcontainer">
            <div id="page-header">
<div class="page-logo">

<?php
include_once("../controllers/SessionInfo.php");
?> 

</div>
	<div class="page-logo2">
	 <img height="80px;" src="../controllers/images/Capture.PNG"/>
	</div>
	</div>
	<div id='page-container'>
	 <div class='menu'>
	<ul class='ui-menu'>
<?php
	require_once("../controllers/PrintSideMenu.php");
	
	echo (PrintSideMenu::autoPrint(basename(__FILE__)));
?>
				</ul>
				</div>
                <div class="right-div">


 <div class="table-hoder">
	<div class="personal-bg-table">
            <span>Rooms</span>
	</div>
	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/RoomsHandling.php");
		?>
		
	</table>
</div>
<!--250px-->
		 
        </div>
	</div>

</body>
</html>

