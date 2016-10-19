<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

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
		document.getElementById("CreateNewTaskTable").style.display ="block";	
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
  
  </script>
  
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

<div class="personal-bg-table">
            <span>Room Settings</span>
            <hr class="hr-table" />
        </div>
		</div>
		

<div id="right-div1-hidden" class="right-div" style="display:none;">	
<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-plus-green2.png"
				id="div-plus1"
				width="35px" 
				height="35px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
	</a>
	<br />
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
				
			<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
					<a  href="#" onclick="unHideUpload();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Upload image</span>
							<img align="center" id="abc" src="../controllers/images/Upload3.png" width="60" height="60" />
						</div>
					</a>
				</div>	
				
				
		<?php
		include_once("../controllers/PreRoomSettings-BGs.php");
		?>
	<br /><br /><br />
</div>




<div id="right-div2-hidden" class="right-div" style="display:none;">	
<a  href="#" onclick="HideUnhideDiv2();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-plus-green2.png"
				id="div-plus1"
				width="35px" 
				height="35px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
	</a>
	<br />
</div>

		<div id="right-div2" class="right-div">

		<a  href="#" onclick="HideUnhideDiv2();return false;" style="text-decoration:none; ">	
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
		
		
		<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
					<a  href="#" onclick="unHideNewTask();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Create New Task</span>
							<img align="center" id="abc" src="../controllers/images/task-add1.png" width="60" height="60" />
						</div>
					</a>
		</div>	
	
		<?php
		include_once("../controllers/PreRoomSettings-tasks.php");
		?>

       	<br /><br /><br />
		</div>
		
		
		
		
		
		
		
        </div>
	</div>

</body>
</html>

