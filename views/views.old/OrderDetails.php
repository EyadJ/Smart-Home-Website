<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>

<html>

<head>
<title>Order Details</title>
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
            <span>Order Details</span>
            <hr class="hr-table" />
        </div>
<br>
    
<table border = "3" cellspacing="1" cellpadding ="5" 
width ="30%" height  ="30px" bgcolor="white" align= "center"  style="width: 50%;">

<tr><th colspan="2"> Your Order Details: </th> </tr>
    
    <tr><td> Order Number: </td>
<td> <i><u>1354984</u></i></td> </tr>

<tr><td> Order Date:  </td>
<td> 10-MAY-2015</td> </tr>

<tr><td> Order Time: </td>
<td> 01:13</td> </tr>
  
</table>




</body>
<html>
