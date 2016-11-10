<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>Modify User Settings</title>
    <link href="../controllers/style.css" rel="stylesheet"/>

	   
  <script>
  
function HideUnhideDiv1() 
{
	var x = document.getElementById("right-div1").style.display;	
	
	if (x=="none")
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

function deleteUserMsg(id) 
{
	document.getElementById("deleteMsg").style.display ="inline";	
	document.getElementById("deleteMsgDim").style.display ="inline";	
	
	document.getElementById("deleteUserForm").action="../controllers/DeleteUserHandling.php?var=" + id ;
}

function deleteUserSubmitClicked() 
{
	document.getElementById("deleteUserForm").submit();
}

function hideDeleteUserMsg() 
{
	document.getElementById("deleteMsg").style.display ="none";	
	document.getElementById("deleteMsgDim").style.display ="none";	
}

</script>
</head>
<body>
     <div class="allcontainer">
	 
	 


<form name="delete" method="post" id="deleteUserForm">

<div class="dim" id="deleteMsgDim"></div>  
		<table  class="dialog" id="deleteMsg" style="width:450px; height:146px;">
			<tr><td>
			<b><h3 id="message">Are you sure you want to delete this User ?</h3></b><br />
			&nbsp;<b>NOTE:</b> Make sure the user has no <u>Tasks</u> or <u>Rooms</u> under his name in order to delete him/her.
			</td></tr>
			<tr><th style="height:30px;">	
			<a href='#' onclick="deleteUserSubmitClicked();return false;" style="text-decoration:none; ">
			<button type='button' style="color:red;">Delete</button>
			</a>
			<a href='#' onclick="hideDeleteUserMsg();return false;" style="text-decoration:none; ">
			<button type='button'>Cancel</button>
			</a>
			</th></tr>
		</table>
		
	</form>
			 

           
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
            <span>Modify User Settings</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:123px;"><b>User Settings</b></div>

	
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
		
		
            <div class="right-div-secondary-title" style="width:123px;"><b>User Settings</b></div>

<?php 
	include_once("../controllers/PreModifyUserSettings.php");
?>
	

<br /><br />
</div>

	
           
</body>
</html>
