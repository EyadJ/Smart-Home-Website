<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Log</title>

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

function unHideFilters() 
{
	var x = document.getElementById("FiltersDiv").style.display;	
		
	if (x=="none")
	{
		document.getElementById("FiltersDiv").style.display ="block";	
	}
	else
	{
		document.getElementById("FiltersDiv").style.display ="none";
	}
}

function roomsVisibility(RoomID) 
{
	var displayText = "none";
	if(RoomID == 0)
	{
		displayText = "block";
	}
	var roomsArray = document.getElementsByClassName("roomDiv");
		
	
	for(var i = 0; i < roomsArray.length; i++)
	{
		roomsArray[i].style.display = displayText;
	}	
	
	if(RoomID != 0)
	{
		document.getElementById(RoomID).style.display = "block";	
	}
}

function usersTasksVisibility(UserID) 
{
	var displayText = "none";
	if(UserID == 0)
	{
		displayText = "table-row";
	}
	var roomsArray = document.getElementsByClassName("taskDiv");
		
	for(var i = 0; i < roomsArray.length; i++)
	{
		roomsArray[i].style.display = displayText;
	}	
	
	if(UserID != 0)
	{
		var roomsArray = document.getElementsByClassName(UserID);
			
		for(var i = 0; i < roomsArray.length; i++)
		{
			roomsArray[i].style.display = "table-row";
		}	
	}
}

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

function ShowEnableTaskOnTime(x) 
{
	x.style.display = "inline-table";	
}

function HideEnableTaskOnTime(x) 
{
	x.style.display = "none";	
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
            <span>Log</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:107px;"><b>Log History</b></div>

	
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
		
            <div class="right-div-secondary-title" style="width:107px;"><b>Log History</b></div>
            		
					
			<div style=" margin-left:auto; margin-right:auto; width:50px;">
	
			<a  href="#" onclick="unHideFilters();return false;" style="text-decoration:none; ">
				<div class="tooltip"><span class="tooltiptext">Filter the Tasks</span>
					<img align="center" id="abc" src="../controllers/images/filter.png" width="55" height="55" />
					<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
				</div>
			</a>
		</div>	
		
	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/PreLog.php");
		?>
		
	</table>
	
	
       	<br /><br /><br />
		</div>

	 
        </div>
	</div>

</body>
</html>

