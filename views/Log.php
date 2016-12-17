<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"]) || !$_SESSION["isAdmin"]){ header("Location: Rooms.php"); } ?>

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
		document.getElementById("FiltersDiv").style.display ="table";	
	}
	else
	{
		document.getElementById("FiltersDiv").style.display ="none";
	}
}

function updateVisibleLogRecords(x, RecordCategoryID) 
{
	var visibleValue = x.checked;

	var recordClassName = "LogCategory_" + RecordCategoryID + "";
	var displayText = "none";
	
	if(visibleValue == true)
		displayText = "table-row";
	
	var logRecordsArray = document.getElementsByClassName(recordClassName);
	
	for(var i = 0; i < logRecordsArray.length; i++)
		logRecordsArray[i].style.display = displayText;
}

function showAllLogRecords(x) 
{
	var showAllValue = x.checked;

	var displayText = "none";
	var displayText2 = false;
	
	if(showAllValue == true)
	{
		displayText = "table-row";
		displayText2 = true;
		x.checked = false;
	}
	else
		x.checked = true;			
	
	//-----------------//
	var logRecordsArray = document.getElementsByClassName("logRecord");
	
	for(var i = 0; i < logRecordsArray.length; i++)
		logRecordsArray[i].style.display = displayText;
	//-----------------//
	
	//-----------------//
	var LogCategoryfiltersArray = document.getElementsByClassName("LogCategoryfilter");
	
	for(var i = 0; i < LogCategoryfiltersArray.length; i++)
		LogCategoryfiltersArray[i].checked = displayText2;
	//-----------------//
}

function updateSqlOrderBy(x) 
{
	window.location.href = "Log.php?Order=" + x + "";
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
				<div class="tooltip"><span class="tooltiptext" style="width:140px;">Filter Log Records</span>
					<img align="center" id="abc" src="../controllers/images/filter.png" width="55" height="55" />
					<img src='../controllers/images/info.png' style='width:12px; height:12px; position:absolute; top:1px; right:1px;'/>
				</div>
			</a>
		</div>	
		
		<?php
		include_once("../controllers/PreLog.php");
		?>
	
	
       	<br /><br /><br />
		</div>

	 
        </div>
	</div>

</body>
</html>

