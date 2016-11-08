<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Homepage</title>
  <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>
  
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
         
	</div>

</body>
</html>

