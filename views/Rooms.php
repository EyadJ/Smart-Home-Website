<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Rooms</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="refresh" content="60" >
  
  <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>
     
<style>
.DeviceDiv:hover{
	background-color:#CCCCCC;
}
</style>  

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
            <span>Rooms</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:161px;"><b>Rooms & Devices</b></div>

	
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
		
		
            <div class="right-div-secondary-title" style="width:161px;"><b>Rooms & Devices</b></div>
            		
		
	<table style="background-color:white; border:0px solid transparent;"> 
			
		<?php
		include_once("../controllers/PreRooms.php");
		?>
		
	</table>
	
	
       	<br /><br /><br />
		</div>

	 
        </div>
	</div>

</body>
</html>

