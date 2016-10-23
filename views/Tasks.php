<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Tasks</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
</head>
<body>
 
            <div class="allcontainer">

			
			 

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
            <span>Tasks</span>
            <hr class="hr-table" />
        </div>
				
				

	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/PreTasks.php");
		?>
		
	</table>
</div>

        </div>
	</div>

</body>
</html>

