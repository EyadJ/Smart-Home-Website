<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>Modify Product page</title>
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

     <div class="table-hoder">
        <div class="personal-bg-table">
            <span>Modify Product</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
 
<?php
	include_once("../controllers/PreModifyProduct.php");
?>	

</td></tr>
    </table>
</form>

		</div>

		<div class="clearfix"></div>
		<br />
		<br />
		</div>
        
</body>
</html>
