<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) ){  header("Location: Homepage.php"); } ?>

<html>

<head>
<title>Orders</title>
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
            <span>Orders</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>

    <br><br>
    
 <form method="get" action="orderDetails.php">

<table border = "3" cellspacing="1" cellpadding ="5" 
height  ="30px" bgcolor="white" align= "center">

<tr><th> Order Number</th>
<th>  Order Date</th>
<th>  Order Time</th>
<th>  Status</th>
<th>  View Details</th>
    </tr>
    
    <tr><td>1354984</td>
<td>  10-MAY-2015</td>
<td>  01:13</td>
<td>  Pending</td>
         <td colspan=2><a href="orderDetails.php" style="text-decoration:none; "> <button type="button">
      More Details  </button></a></td>
<!--<td align=center> <input type="submit" name="o_1354984" value="More Details"/> </td>-->
    </tr>
    
      <tr><td>1354912</td>
<td>  10-MAY-2015</td>
<td>  10:54</td>
<td>  In Delivery</td>
           <td colspan=2>
      <a href="orderDetails.php" style="text-decoration:none; "><button type="button"> More Details</button>  </a></td>
<!--<td align=center> <input type="submit" name="o_1354912" value="More Details"/> </td>-->
    </tr>
    
    <tr><td>1354502</td>
<td>  09-MAY-2015</td>
<td>  11:37</td>
<td>  Delivered</td>
          <td colspan=2> <a href="orderDetails.php" style="text-decoration:none; "><button type="button">
      More Details  </button></a></td>
<!--<td align=center> <input type="submit" name="o_1354502" value="More Details"/> </td>-->
    </tr>
    </tr>
    
</table>

</form>

    </div>
</body>
<html>
