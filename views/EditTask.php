<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: Homepage.php"); } ?>


<?php 
	include_once("../controllers/PreEditTask-SecurityChecks.php");
?>

<html>
<head>
<title>Edit Task</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>

	
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



//
//EDIT-TASK FORM POPUPS - [START]
//

function HideAllButParameter(x) 
{
	var array = document.getElementsByClassName("SensorsValues");

	for(i = 0; i < array.length; i++)
	{
		if(array[i].id == x)
			array[i].style.display = "inline-block";
		else
			array[i].style.display = "none";
	}
	
	//Hide devices when detecting gas (gas sensor chosen)
	if(x === 11)
	{
		document.getElementById("RoofLamp_off_button").disabled = true;
		document.getElementById("RoofLamp_on_button").disabled = true;
		document.getElementById("RoofLamp_noChange_button").checked = true;
		
		document.getElementById("AC_off_button").disabled = true;
		document.getElementById("AC_on_button").disabled = true;
		document.getElementById("AC_noChange_button").checked = true;
	}
	else
	{
		document.getElementById("RoofLamp_off_button").disabled = false;
		document.getElementById("RoofLamp_on_button").disabled = false;
		
		document.getElementById("AC_off_button").disabled = false;
		document.getElementById("AC_on_button").disabled = false;
	}
}

function UnhideMotionSensorSecondaryOption() 
{
	document.getElementById("MotionSensorDurationTable").style.display = "block";
}

function HideMotionSensorSecondaryOption() 
{
	document.getElementById("MotionSensorDurationTable").style.display = "none";
}

function HideUnhideActionDate(action) 
{
	var x = document.getElementById("actionDate").style.display;	
	
	if (action == 1)
	{
		document.getElementById("actionDate").style.display = "inline-block";
		document.getElementById("OneTimeAction").style.backgroundColor = "#CCCCCC";
		document.getElementById("OneTimeAction").style.border = "1px solid black";
	}
	else if (action == 0)
	{
		document.getElementById("actionDate").style.display = "none";
		document.getElementById("OneTimeAction").style.backgroundColor = "transparent";
		document.getElementById("OneTimeAction").style.border = "0px";
	}
}

function HideAlarmDetails() 
{
	document.getElementById("alarmDetails").style.display ="none";
}

function UnhideAlarmDetails() 
{
	document.getElementById("alarmDetails").style.display ="table-row";
}
 
function cameraSettings(x) 
{
	if(x.value === "1")
	{
		x.parentNode.parentNode.parentNode.parentNode.childNodes[5].style.display ="table-row";
	}
	else
	{
		x.parentNode.parentNode.parentNode.parentNode.childNodes[5].style.display ="none";
	}	
} 
  
function HideAnotherActionDate() 
{
	document.getElementById("AnotherActionDate").style.display ="none";
}
 
function ShowAnotherActionDate() 
{
	document.getElementById("AnotherActionDate").style.display ="inline";
}

function EnableTaskOnTimeHandling() 
{	
	if(document.getElementById("EnableTaskOnTimeValue").value)
		document.getElementById("EnableTaskOnTime").checked = true;
	else
		document.getElementById("EnableTaskOnTime").checked = false;
	
	handleRequiredForEnabledAndDisabled();
}

function EnableTaskOnTimeValueHandling() 
{
	if(!document.getElementById("EnableTaskOnTime").checked)
		document.getElementById("EnableTaskOnTimeValue").value = null;
	
	handleRequiredForEnabledAndDisabled();
}

function DisableTaskOnTimeHandling() 
{	
	if(document.getElementById("DisableTaskOnTimeValue").value)
		document.getElementById("DisableTaskOnTime").checked = true;
	else
		document.getElementById("DisableTaskOnTime").checked = false;
	
	handleRequiredForEnabledAndDisabled();
}

function DisableTaskOnTimeValueHandling() 
{
	if(!document.getElementById("DisableTaskOnTime").checked)
		document.getElementById("DisableTaskOnTimeValue").value = null;
	
	handleRequiredForEnabledAndDisabled();
}

function handleRequiredForEnabledAndDisabled() 
{
	var x = document.getElementById("EnableTaskOnTimeValue");
	var y = document.getElementById("DisableTaskOnTimeValue");
	var z = document.getElementById("EnableTaskOnTime");
	var m = document.getElementById("DisableTaskOnTime");
	
	if(x.value || y.value || z.checked || m.checked)
	{
		x.required = true;
		y.required = true;
	}
	else if(!x.value && !y.value && !z.checked && !m.checked)
	{
		x.required = false;
		y.required = false;
	}
}
	
//
//EDIT-TASK FORM POPUPS - [END]
//

function deleteTaskMsg(TaskID, action) 
{
	document.getElementById("deleteMsg").style.display ="inline";	
	document.getElementById("deleteMsgDim").style.display ="inline";	
	
	var referrer = document.getElementById("referrer").value;	
	
	var url = "../controllers/DeleteTaskHandling.php?var=" + TaskID + "&action=" + action + "&referrer="+ referrer + "";
	
	document.getElementById("deleteTaskForm").action = url;
}

function deleteTaskSubmitClicked() 
{
	document.getElementById("deleteTaskForm").submit();
}

function hideDeleteTaskMsg() 
{
	document.getElementById("deleteMsg").style.display ="none";	
	document.getElementById("deleteMsgDim").style.display ="none";	
}

window.onkeydown = function( event ){ if ( event.keyCode == 27 ) hideDeleteTaskMsg(); };

  </script>
  
  
</head>

<body>
     <div class="allcontainer">
	 
	 
	 
<form name="delete" method="post" id="deleteTaskForm">

<div class="dim" id="deleteMsgDim"></div>  
		<table  class="dialog" id="deleteMsg" style="width:340px; height:125px;">
			<tr><td>
			<b><h3 id="message">Are you sure you want to delete this Task ?</h3></b><br />
			</td></tr>
			<tr><th style="height:30px;">	
			<a href='#' onclick="deleteTaskSubmitClicked();return false;" style="text-decoration:none; ">
			<button class='button' type='button' style="color:red;">Delete</button>
			</a>
			<a href='#' onclick="hideDeleteTaskMsg();return false;" style="text-decoration:none; ">
			<button class='button' type='button'>Cancel</button>
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
            <span>Edit Task</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:198px;"><b>Change Task Settings</b></div>

	
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
		
            <div class="right-div-secondary-title" style="width:198px;"><b>Change Task Settings</b></div>
          	<br />  	
<?php 
	include_once("../controllers/PreEditTask.php");
?>
	
	<br /><br /><br />
		</div>
	
</body>
</html>
