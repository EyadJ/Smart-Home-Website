<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Upload New Room Background</title>
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
                <div class="right-div">

<div class="personal-bg-table">
            <span>Upload New Room Background</span>
            <hr class="hr-table" />
        </div>
				
				
			
	<form method="post" action="../controllers/UploadNewRoomBgHandling.php">
				
	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/PreUploadNewRoomBG.php");
		?>
		
	</table>
	
	</form>
	
</div>

        </div>
	</div>

</body>
</html>

