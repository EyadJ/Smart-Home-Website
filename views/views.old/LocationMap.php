<?php error_reporting(0); session_start(); ?>

<html>

<head>
<title>Location Map</title>
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

<br>
<table border = "2" cellspacing="0" cellpadding ="0" 
width ="30%" height  ="0px" bgcolor="lightgray" align= "center">

<tr><th><h1>Find us using Google Maps</h1></th></tr>
</table>

<br>

<iframe 
src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d758.0571403386184!2d39.18166791507623!3d21.522986318025925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xa2dd64cdc07680af!2sTower+Building!5e0!3m2!1sen!2ssa!4v1443984951602"
 width="100%" height="500" frameborder="0" allowfullscreen> 
</iframe>

    </div>                     
</body>
<html>
