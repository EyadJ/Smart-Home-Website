<?php error_reporting(0); session_start(); if (!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE) header("Location: Homepage.php");?>

<html>
<head>
<title>Product Managment</title>
 
    <link href="../controllers/style.css" rel="stylesheet" />


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

     <div class="table-hoder">
        <div class="personal-bg-table">
            <span>Product Managment</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  
            <div style="vertical-align:middle; padding-left:20px; display:block;">
<a style="padding-left:20px;"  href="AddProduct.php" style="text-decoration:none; ">
<div style="display:inline-block; vertical-align:middle;">
    <img src="../controllers/images/add.png" width="40" height="40" />
</div>
<div style="display: inline-block; vertical-align: middle;">
    <span>Add New Product</span>
</div>
</a>  
         </div>
    <table>

<?php
include_once("../controllers/PreProductManagment.php");
?>

</table>
	</div>

	<div class="clearfix"></div>
	<br />
	<br />
	</div>
</body>
</html>

