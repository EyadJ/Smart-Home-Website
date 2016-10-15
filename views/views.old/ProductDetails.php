<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>

<html>

<head>
<title>Product Details</title>
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
            <span>Product Details</span>
            <hr class="hr-table" />
        </div>
                            
<br>
    <form action="productDetails.php">             
         
     <table style="width:60%;">         

<?php  
	require_once("../controllers/PreProductDetails.php");
 ?>
 
 </table>
 
    </form>

</div>
</body>
<html>
