<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>

<html>

<head>
<title>Order Product</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
</head>
<body>
    <form id="form1">
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
        
<br><br><br><br>
    
    <form method="get" action="orderList.php" >

<table border = "3" cellspacing="1" cellpadding ="5" 
height  ="40px"  bgcolor="white" align= "center" style="width: 50%;">

   
    <tr><th colspan="2" style="padding:6px 0 6px 0%">Your Order</th></tr>
    
<tr><td><i> Order Number:</i></td><td> <u>1354984</u></td></tr>
    
<tr><td> Device Name: </td>

<td> XYZ </td></tr>
     
<tr><td> Device Brand: </td>

<td> Medtronic </td> </tr>

    <tr><td> Price: </td>

<td> SR 9500 </td> </tr>

    <tr><td> Payment Method </td>

<td> 
     <input type = "text" name = "paymentMethod" list = "paymentMethod">

    <datalist id = "paymentMethod">
  <option value = "On Delivery"> 
  <option value = "Bank Transfer"> 
    <option value = "Credit: 1 month"> 
    <option value = "Credit: 2 months"></datalist> </td> </tr>

      <tr><td> Quantity: </td>
<td> <input type="text" maxlength="4" name="quantity" value="1"/> 
 </td> </tr>

        <tr><th colspan=2 style=" padding:6px 0 6px 0%; "><button type="button">
      <a href="orderList.php" style="text-decoration:none; padding:6px 0 6px 0%; "> Confirm </a></button></th>
   <!--<th  colspan=2 align=center style="padding:6px 0 6px 0%"> <input type="submit" value="Confirm"/> </th>-->

  </tr>
  
</table>

</form>

</div>

</body>
<html>
