<?php error_reporting(0); session_start(); if (!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE) header("Location: Homepage.php"); ?>

<html>
<head>
<title>Add Product</title>
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
            <span>Add Product </span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  

  <form name='myForm' method='post' action="../controllers/AddProductHandling.php" enctype='multipart/form-data'>
  
<table style="width:600px; align:center;">
<tr><td>Name</td><td align='left'><input name='name' type='text' maxlength='25' required/></td></tr>
<tr><td>Cost</td><td align='left'><input name='cost' type='number' required/></td></tr>    
 
<?php
	include_once("../controllers/PreAddProduct.php");
?>	

</tr>
<tr>
<td>Img</td><td align="left"><input type="file" name="fileToUpload" id="fileToUpload" required/></td>
</tr>    
<tr><td>Description</td><td align='left'><textarea rows="4" cols="50" name='desc'> </textarea></td></tr>    
                
<tr><td align="left">
<input type="submit" onclick="return chgAction();" value="Save" /></td><td align="left">
<input type="reset" value="Reset"/>
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
    