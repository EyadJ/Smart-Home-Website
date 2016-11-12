<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<?php include_once("../controllers/PreRoomSettings.php"); ?>


<html>
<head>
<title>Room Settings</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
  <script>
  
function unHideUpload() 
{
	var x = document.getElementById("uploadTable").style.display;	
		
	if (x=="none")
	{
		document.getElementById("uploadTable").style.display ="block";	
	}
	else
	{
		document.getElementById("uploadTable").style.display ="none";
	}
}

function unHideNewTask() 
{
	var x = document.getElementById("CreateNewTaskTable").style.display;	
		
	if (x=="none")
	{
		document.getElementById("CreateNewTaskTable").style.display ="table";	
	}
	else
	{
		document.getElementById("CreateNewTaskTable").style.display ="none";
	}
}

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

function HideUnhideDiv2() 
{
	var x = document.getElementById("right-div2").style.display;	
	
	if (x=="none")
	{
		document.getElementById("right-div2").style.display ="inline";
		document.getElementById("right-div2-hidden").style.display ="none";
	}
	else
	{
		document.getElementById("right-div2").style.display ="none";
		document.getElementById("right-div2-hidden").style.display ="inline";
	}
}

//
//CREATE-NEW-TASK FORM POPUPS - [START]
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
		x.parentNode.parentNode.parentNode.parentNode.childNodes[6].style.display ="table-row";
	}
	else
	{
		x.parentNode.parentNode.parentNode.parentNode.childNodes[6].style.display ="none";
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
}

function EnableTaskOnTimeValueHandling() 
{
	if(!document.getElementById("EnableTaskOnTime").checked)
		document.getElementById("EnableTaskOnTimeValue").value = null;
}

function DisableTaskOnTimeHandling() 
{
	if(document.getElementById("DisableTaskOnTimeValue").value)
		document.getElementById("DisableTaskOnTime").checked = true;
	else
		document.getElementById("DisableTaskOnTime").checked = false;
}

function DisableTaskOnTimeValueHandling() 
{
	if(!document.getElementById("DisableTaskOnTime").checked)
		document.getElementById("DisableTaskOnTimeValue").value = null;
}
//
//CREATE-NEW-TASK FORM POPUPS - [END]
//

//
//View Task - Alarm Details - [START]
//
function showAlarmDetails(x) 
{
	x.style.display = "inline-table";	
}

function hideAlarmDetails(x) 
{
	x.style.display = "none";	
}

function showCameraDetails(x) 
{
	x.style.display = "inline-table";	
}

function hideCameraDetails(x) 
{
	x.style.display = "none";	
}
//
//View Task - Alarm Details - [END]
//
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
            <span>Room Settings</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:180px;"><b>Tasks in This Room</b></div>

	
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
		
		
            <div class="right-div-secondary-title" style="width:180px;"><b>Tasks in This Room</b></div>
            		
		
		<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
					<a  href="#" onclick="unHideNewTask();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Create New Task</span>
							<img align="center" id="abc" src="../controllers/images/task-add1.png" width="60" height="60" />
							<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</div>
					</a>
		</div>	
	
		<?php
		include_once("../controllers/PreRoomSettings-createTask.php");
		?>

		
	
		<?php
		include_once("../controllers/PreRoomSettings-viewTasks.php");
		?>
		
	
		
       	<br /><br /><br />
		</div>
		
	



<div id="right-div2-hidden" class="right-div" style="display:none;">	

		<div class="personal-bg-table" align="center" style="line-height: 40%;"> <hr class="hr-table-hidden-div"/>.<br />.<br />.</div>	

<a href="#" onclick="HideUnhideDiv2();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-plus-green2.png"
				id="div-plus1"
				width="35px" 
				height="35px" 
				style="
				margin-left:97.5%;
				margin-top:-7.5%;
				" />
	</a>
	<br />
	
	<div class="hidden-right-div-secondary-title" style="width:170px;"><b>Room Background</b></div>
            		
</div>
	
		<div id="right-div2" class="right-div">
	
	
	<a href="#" onclick="HideUnhideDiv2();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-minus-red.png"
				id="div-minus1"
				width="40px" 
				height="40px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
	</a>	

            <div class="right-div-secondary-title" style="width:170px;"><b>Room Background</b></div>
	
				
			<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
					<a  href="#" onclick="unHideUpload();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Upload image</span>
							<img align="center" id="abc" src="../controllers/images/Upload3.png" width="60" height="60" />
							<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
						</div>
					</a>
				</div>
				
				
		<?php
		include_once("../controllers/PreRoomSettings-BGs.php");
		?>
	<br /><br /><br />
</div>
	
		
		

        </div>
	</div>

</body>
</html>

