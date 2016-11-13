<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>My Account</title>
    <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>

	
  <script>
  
function HideUnhideDiv1() 
{
	var x = document.getElementById("right-div1").style.display;	
	
	if (x == "none")
	{
		document.getElementById("right-div1").style.display ="inline";
		document.getElementById("right-div1-hidden").style.display ="none";
	}
	else
	{
		document.getElementById("right-div1").style.display ="none";
		document.getElementById("right-div1-hidden").style.display ="inline";
	}
}

function HideUnhideChangePW() 
{
	var x = document.getElementById("ChangePWtable").style.display;	
		
	if (x == "none")
		document.getElementById("ChangePWtable").style.display ="table";	
	else
		document.getElementById("ChangePWtable").style.display ="none";
}

  </script>
  
  
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

        <div class="personal-bg-table">
            <span>My Account</span>
            <hr class="hr-table" />
        </div>
  	  </div>
	
<div id="right-div1-hidden" class="right-div" style="display:none;">	

		<div class="personal-bg-table" align="center" style="line-height: 40%;"> <hr class="hr-table-hidden-div"/>.<br />.<br />.</div>	

<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-plus-green2.png"
				id="div-plus1"
				width="35px" 
				height="35px" 
				style="
				margin-left:97.5%;
				margin-top:-7.5%;
				" />
	</a>
	
<div class="hidden-right-div-secondary-title" style="width:157px;"><b>Account Settings</b></div>

	
</div>


<div id="right-div1" class="right-div">

		<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-minus-red.png"
				id="div-minus1"
				width="40px" 
				height="40px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
		</a>		
		<br />
		
		
            <div class="right-div-secondary-title" style="width:157px;"><b>Account Settings</b></div>
            	
				
				<div style=" margin-left:auto; margin-right:auto; width:200px;">
					<a  href="#" onclick="HideUnhideChangePW();return false;" style="text-decoration:none; ">
						<div class="tooltip">
						<span class="tooltiptext" style="margin-left:200px; margin-top:-30px;">Change Your Password</span>
							<img align="center" id="abc" src="../controllers/images/change-password.png" width="220px" />
							<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</div>
					</a>
				</div>
				
				<form method="post" action="../controllers/ChangePasswordHandling_AdminRights.php" >
					<table id="ChangePWtable" style="display:none; margin-left:auto; margin-right:auto; width:350px;">
					
						<tr><th colspan="2">Change Password</th></tr>

						<tr><td>Enter The Old Password </td>
						<td><input type="password" name="OldPass" required style="width:90px;"/></td></tr>
						
						<tr><td>Enter The New Password </td>
						<td><input type="password" name="NewPass" required style="width:90px;"/></td></tr>
						
						<tr><td>Renter The New Password </td>
						<td><input type="password" name="NewPassConf" required style="width:90px;"/></td></tr>
						
						<tr><th colspan="2"><input type="submit" class="button" name="UpdatePass" value="Update Password" style="width:140px;"/></th></tr>
					</table>
				</form>
				
<?php 
	include_once("../controllers/PreMyAccount.php");
?>
	


	<br /><br />
		</div>

		   
</body>
</html>
