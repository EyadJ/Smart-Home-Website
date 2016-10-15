<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html >
<head >
<title>Control Panal page</title>
   
    <link href="../controllers/style.css" rel="stylesheet"/>

</head>
<body>

<div id="mainDialog">

</div>

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
            <span>Control Panal</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  
            <div style="vertical-align:middle; padding-left:20px; display:block;">
<a padding-left:20px;  href="AddSupplier.php" style="text-decoration:none; ">
<div style="display:inline-block; vertical-align:middle;">
    <img src="../controllers/images/add.png" width="40" height="40" />
</div>
<div style="display: inline-block; vertical-align: middle;">
    <span>Add New Supplier</span>
</div>
</a>
      
         </div>
    
    <form method="post">
    
<table >
<thead><tr><th width="20%" >Img</th><th width="30%" >Name</th><th width="10%" >Product<br />Managment</th><th width="10%" >Modify Supplier Details</th><th width="10%" >Delete<br />Supplier</th></tr></thead>

<?php
 include_once("../controllers/PreControlPanal.php");
?>

</table>
</form>
		</div>

		<div class="clearfix">
		<br />
		<br />
					</div>
	</form>
    </div>
</body>
</html>
