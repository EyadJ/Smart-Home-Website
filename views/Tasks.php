<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Tasks</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
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


 <div class="table-hoder">
	<div class="personal-bg-table">
            <span>Tasks</span>
	</div>
	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/TasksHandling.php");
		?>
		
	</table>
</div>
<!--250px-->
		 
        </div>
	</div>

</body>
</html>

