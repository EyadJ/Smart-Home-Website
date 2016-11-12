<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>

<html>
<head>
<title>Security Cameras</title>
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

function reduceDivsSize() 
{
	var x = document.getElementById("right-div1");
	x.style.width ="24%";
	x.style.minWidth ="325px";
	x.style.display ="inline-block";
	x.style.position ="absolute";
	x.style.left ="0%";
	x.style.top ="90px";

	var y = document.getElementById("right-div2");
	y.style.width ="24%";
	y.style.minWidth ="325px";
	y.style.display ="inline-block";
	y.style.position ="absolute";
	y.style.left ="26%";
	y.style.top ="90px";
	
	document.getElementById("right-div1-hidden").style.display ="none";
	document.getElementById("right-div1-minus").style.visibility ="hidden";	
	
	document.getElementById("right-div2-hidden").style.display ="none";
	document.getElementById("right-div2-minus").style.visibility ="hidden";	
}

function increaseDivsSizeBackToNormal() 
{
	var x = document.getElementById("right-div1");
	x.style.width ="50%";
	x.style.minWidth ="650px";
	x.style.display ="block";
	x.style.position ="relative";
	x.style.marginLeft ="25%";
	x.style.left ="0px";
	x.style.top ="0px";

	var y = document.getElementById("right-div2");
	y.style.width ="50%";
	y.style.minWidth ="325px";
	y.style.display ="block";
	y.style.position ="relative";
	y.style.marginLeft ="25%";
	y.style.left ="0px";
	y.style.top ="0px";
	
	document.getElementById("right-div1-minus").style.visibility ="visible";	
	
	document.getElementById("right-div2-minus").style.visibility ="visible";	
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
				<div class="personal-bg-table" >
				<span>Security Cameras</span>
				<hr class="hr-table" />
					</div>
			</div>
			
			
				
			<div style="right:76%; top:263px; width:105px; position:fixed; padding-left:20px; padding-right:10px; padding-top:4px; border-radius :15px; background: #fff; ">
				
				
				<div class="right-div-secondary-title" 
				style="width:94px; height:15px; font-size:15px; position:fixed; top:289px; margin-left:-3px; 
				padding-top:1px; padding-bottom:4px; padding-left:4px; padding-right:4px;"><b>View Options</b></div>
				
				<br />
					<a  href="#" onclick="reduceDivsSize();" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Cluster</span>
							<img align="center" id="abc" src="../controllers/images/view-cluster.png" width="40px"/>
						</div>
					</a>
				
					<a  href="#" onclick="increaseDivsSizeBackToNormal();return false;" style="text-decoration:none; ">
						<div class="tooltip"><span class="tooltiptext">Blocks</span>
							<img align="center" id="abc" src="../controllers/images/view-blocks.png" width="60px"/>
						</div>
					</a>
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
	
<div class="hidden-right-div-secondary-title" style="width:166px;"><b>Security Camera 1</b></div>

	
</div>


	<div id="right-div1" class="right-div" 
	style="width:24%; min-width:325px; display:inline-block; position:absolute; left:0%; top:90px;">

	<span id="right-div1-minus" style="visibility:hidden;">
		<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none;">	
		<img src="../controllers/images/div-minus-red.png"
				id="div-minus1"
				width="40px" 
				height="40px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
		</a></span>
		<br />
		
		
            <div class="right-div-secondary-title" style="width:166px;"><b>Security Camera 1</b></div>
            		
		<img style="margin-left:5%;" src="http://192.168.1.101/video.cgi?user=admin&pwd=admin" width ="90%"
		alt="Cannot Establish Connection with this Camera" 
		onerror="this.onerror=null;this.src='../controllers/images/Camera-not-connected.jpg';"/>
		
		<a href="http://192.168.1.101" target="_blank"> 
			<img src='../controllers/images/settings-icon (1).png' width='40px' height='40px'
			style=' z-index:0; position:absolute; bottom:8%; right:7%; '/>
		</a>
		
		<br /><br />
       
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
			
			<div class="hidden-right-div-secondary-title" style="width:166px;"><b>Security Camera 2</b></div>
							
		</div>
	
		<div id="right-div2" class="right-div"
		style="width:24%; min-width:325px; display :inline-block; position:absolute; left:26%; top:90px;">
	
		<span id="right-div2-minus" style="visibility:hidden;">
		<a href="#" onclick="HideUnhideDiv2();return false;" style="text-decoration:none;">	
			<img src="../controllers/images/div-minus-red.png"
				id="div-minus1"
				width="40px" 
				height="40px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				"/>
		</a></span>

		<div class="right-div-secondary-title" style="width:166px;"><b>Security Camera 2</b></div>
	
		<img style="margin-left:5%;" src="http://192.168.1.100/video.cgi?user=admin&pwd=admin" width ="90%"
		alt="Cannot Establish Connection with this Camera" 
		onerror="this.onerror=null;this.src='../controllers/images/Camera-not-connected.jpg';"/>
		
		<a href="http://192.168.1.100" target="_blank"> 
			<img src='../controllers/images/settings-icon (1).png' width='40px' height='40px'
			
			style=' z-index:0; position:absolute; bottom:8%; right:7%; '/>
		</a>
			
		<br /><br 	/>
	</div>
</div>
</div>
</body>
</html>











