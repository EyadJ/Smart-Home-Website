<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } ?>


<?php
include_once("../controllers/PreCameraGallery-SecurityChecks.php");
?> 


<html>
<head>
<title>Camera Gallery</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>

<style>
.roomDiv:hover{
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

var lastImgID = 0;

function displayPreview(imgSrc, imgID, width) 
{
	document.getElementById("arrow_right").style.display = "inline";
	document.getElementById("arrow_left").style.display = "inline";
	
	var z = document.getElementById("imgID_" + imgID + "");
	
	document.getElementById("preview").src = imgSrc;
	document.getElementById("preview").width = z.width * 3.6 * 0.9;
	document.getElementById("preview").height = z.height * 3.6 * 0.9;
	
	lastImgID = imgID;
	
	document.getElementById("CameraName").innerHTML = document.getElementById(("imgCamera_" + lastImgID + "")).value;
	document.getElementById("imgDate").innerHTML = document.getElementById(("imgDate_" + lastImgID + "")).value;
	
	x = document.getElementById("preview");
	
	if(width === (133))
	{
		x.style.marginLeft = "80px";
		x.style.marginTop = "0px";
	}
	else if(width === (178))
	{
		x.style.marginTop = "80px";
		x.style.marginLeft = "0px";
	}
	
	document.getElementById("previewDiv").style.display = "inline";	
	document.getElementById("previewDim").style.display = "inline";
}

function hidePreview() 
{
	document.getElementById("previewDiv").style.display = "none";	
	document.getElementById("previewDim").style.display = "none";	
}

function nextImg(y) 
{
	var minCountValue = parseInt(document.getElementById("minCountValue").value);
	var maxCountValue = parseInt(document.getElementById("maxCountValue").value);
	
	lastImgID = lastImgID + y;
	
	if(lastImgID >= minCountValue && lastImgID < maxCountValue)
	{
		var ImgID = "imgID_" + lastImgID + "";
		
		var z = document.getElementById(ImgID);
		
		document.getElementById("CameraName").innerHTML = document.getElementById(("imgCamera_" + lastImgID + "")).value;
		document.getElementById("imgDate").innerHTML = document.getElementById(("imgDate_" + lastImgID + "")).value;
		
		document.getElementById("arrow_right").style.display = "inline";
		document.getElementById("arrow_left").style.display = "inline";
		
		document.getElementById("preview").src = z.src;
		document.getElementById("preview").width = z.width * 3.6 * 0.9;
		document.getElementById("preview").height = z.height * 3.6 * 0.9;
		
		//----------------------------------------------//
		x = document.getElementById("preview");
		var width = z.width;
		
		if(width === (133))
		{
			x.style.marginLeft = "80px";
			x.style.marginTop = "0px";
		}
		else if(width === (178))
		{
			x.style.marginTop = "80px";
			x.style.marginLeft = "0px";
		}
	}
	else
	{
		if(lastImgID <= minCountValue+1)
			lastImgID = minCountValue;
		else if(lastImgID > maxCountValue)
			lastImgID = maxCountValue;
		
		if(y == 1)
			document.getElementById("arrow_right").style.display = "none";
		else if(y == -1)
			document.getElementById("arrow_left").style.display = "none";
	}
}

window.onkeydown = function(event)
{ 
	var previewDim = document.getElementById("previewDim").style.display;

	if ( event.keyCode == 27 ) //escape
		hidePreview(); 
	
	else if ( event.keyCode == 37 && previewDim !== "none") //left arrow
		nextImg(-1);

	else if ( event.keyCode == 39 && previewDim !== "none") //right arrow 
		nextImg(1); 
};

  </script>
  
</head>

<body>
 
      <div class="allcontainer">
	 
	 
	<div class="dim" id="previewDim"></div>
		<div class="dialog" id="previewDiv" style="width:576px; height:576px; background-color:#CCCCCC;">
			
			<div style="position:absolute; right:15px; top:15px;">
			<a href='#' onclick="hidePreview();return false;" style="text-decoration:none; ">
			<img src="../controllers/images/Red_X.png" width="30px" height="30px"/>
			</a></div>
			
			<a href='#' onclick="nextImg(-1);return false;" style="text-decoration:none; ">
			<img src="../controllers/images/arrow-left.png" width="50px" height="50px" id="arrow_left"
			style="position:absolute; left:-5px; top:0; bottom:0; margin:auto;"/>
			</a>
			
			<a href='#' onclick="nextImg(1);return false;" style="text-decoration:none; ">
			<img src="../controllers/images/arrow-right.png" width="50px" height="50px" id="arrow_right"
			style="position:absolute; right:-5px; top:0; bottom:0; margin:auto;"/>
			</a>
			
			<img src="../controllers/images/default-thumbnail.jpg" id="preview"/>
			<br />
			
			<div align="center">
			<b><span id="CameraName" align="center"></span> </b>
			(<span id="imgDate" align="center"></span>)
			</div>
			
		</div>
		
	 
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
            <span>Camera Gallery</span>
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
	
<div class="hidden-right-div-secondary-title" style="width:188px;"><b>View Camera Gallery</b></div>

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
		
		
            <div class="right-div-secondary-title" style="width:188px;"><b>View Camera Gallery</b></div>
            		
			
		<?php
		include_once("../controllers/PreCameraGallery.php");
		?>
		
	
       	<br /><br /><br />
		</div>

	 
        </div>
	</div>

</body>
</html>

