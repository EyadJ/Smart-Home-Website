<?php error_reporting(0); session_start(); ?>

<html>

<head>
<title>About Us</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
</head>
<body>
            <div class="allcontainer">
            <div id="page-header">
                <div class="page-logo">
<?php
include_once("../controllers/Header.php");
?> 
             
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
            <span>Our Buisness</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
      
<br>
    <ul type = "OurBuisness" style="color:black; padding:1px 0 10px 4%;">
        
<font style="font-size:18px;">
<li style="padding:1px 0 10px 0%">We supply all your vascular needs tools and accessories in Saudi Arabia and Bahrain.</li>

<li style="padding:1px 0 10px 0%">Immediate response to your urgent orders from our Thousands items on shelves.</li>

<li style="padding:1px 0 10px 0%">We carry and supply the top quality items from the top names in the world.</li>

<li style="padding:1px 0 10px 0%">Our service and supply are the secret keys behind your continuous successful procedures in the cath lab.</li>

<li style="padding:1px 0 10px 0%">Putting up-to-date technology and knowledge in your hands is our top priorities.</li>
 </font>
</ul>

        </div>
<div align = "center">
<img width="80%" src = "../controllers/Images/inner-header-img.jpg"  alt = "inner-header-img">
    <br> <br> <br>
    </div>
    </div>
</body>
<html>
