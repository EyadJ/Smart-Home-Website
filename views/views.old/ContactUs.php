<?php error_reporting(0); session_start(); ?>

<html>

<head>
<title>Contact Us</title>
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
            <span>Contact us</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
 <span style="color:black;">Our Company's Offices across Saudi Arabia:</span>
        </div>

<table>

<tr>
<th>
<h2>Western Area</h2>
<p>P.O.Box: 52021<br>
Jeddah : 21563<br>	
Kingdom of Saudi Arabia<br>
 + 966 -2-653 0306 / 650 3952<br>
  + 966 -2-652 0590<br><br>
  <i>Tower Building / 4th Floor</i></p>
  
       <button type="button">
      <a href="locationMap.php" style="text-decoration:none; "> Jeddah Office Location Map </a></button>
<br><br>
</th> 

<th>
<h2>Central Area</h2>
<p>P.O.Box: 207<br>
Riyadh : 11351<br>
Tel:  + 966-1-281 3009 / 880 1595<br>
Fax: + 966-1-281 3050</p>
<br><br><br><br><br>
</th>
 
<th>
<h2>Eastern Area</h2>
<p>P.O.Box: 74647<br>
Al-khobar : 31952<br>
Tel:  + 966-3-893 6679<br>
Fax: + 966-3-893 6680</p>
<br><br><br><br><br>
</th>
   </tr>
       </table>
        </div>
</body>
<html>