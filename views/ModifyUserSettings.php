<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>Modify User Settings</title>
    <link href="../controllers/style.css" rel="stylesheet"/>

</head>
<body>
     <div class="allcontainer">
	 
	 
			 
			
           
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
            <span>Modify User Settings</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  	
	
<?php 
	include_once("../controllers/PreModifyUserSettings.php");
?>
	
    
<tr><td align="center" colspan="2">
<input type="submit" value="Save" name="Save" style="font-weight:bold; margin-left:3px;" />

&nbsp;
<input type="reset" value="Reset" />

&nbsp;

<a href="Users.php">
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
