<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>My Account</title>
    <link href="../controllers/style.css" rel="stylesheet"/>

</head>
<body>
     <div class="allcontainer">
	 
	 <img src="../controllers/images/smarthome-background.jpg"
			style="width:100%; position:fixed; top:40px;" /> 
			
       
<?php
include_once("../controllers/Header.php");
?> 
                 
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
            <span>My Account</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  	
	
<?php 
	include_once("../controllers/PreMyAccount.php");
?>
	
    
<tr><td align="center" colspan="2">
<input type="submit" value="Save" name="Save" style="font-weight:bold; margin-left:3px;" />

&nbsp;
<input type="reset" value="Reset" />

&nbsp;

<a href="HomePage.php">
<button type = "button" align="Right">Cancel</button></a>

</td></tr>
    </table>
</form>

                </div>

                <div class="clearfix">
                <br />
                <br />
                </div>
            </div>
</body>
</html>
