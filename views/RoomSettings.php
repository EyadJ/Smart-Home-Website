<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Room Settings</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
  <script>
  
	function unHideContent() {
	var x = document.getElementById("my_file").style.display;	
		
	if (x=="none")
	{
		document.getElementById("my_file").style.display ="inline";
		document.getElementById("my_submit").style.display ="inline";
		document.getElementById("my_table").style.display ="block";	
	}
	else
	{
		document.getElementById("my_file").style.display ="none";
		document.getElementById("my_submit").style.display ="none";
		document.getElementById("my_table").style.display ="none";
	}
    
}
  
  </script>
  
</head>
<body>
 
            <div class="allcontainer">

			<img src="../controllers/images/smarthome-background.jpg"
			style="width:100%; position:fixed; top:40px;" /> 

            <div id="page-header">
<div class="page-logo">

<?php
include_once("../controllers/SessionInfo.php");
?> 

</div>
	<div class="page-logo2">
	 <a href="HomePage.php"><img height="80px;" src="../controllers/images/Capture.PNG"/></a>
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

<div class="personal-bg-table">
            <span>Room Settings</span>
            <hr class="hr-table" />
        </div>
				
			<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
					<a  href="#" onclick="unHideContent();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Upload image</span>
							<img align="center" id="abc" src="../controllers/images/Upload3.png" width="60" height="60" />
						</div>
					</a>
				</div>	
				
				
		<?php
		include_once("../controllers/PreRoomSettings.php");
		?>
	<br /><br /><br />
			
	
	
</div>

        </div>
	</div>

</body>
</html>

