<?php error_reporting(0); session_start(); ?>

<html>

<head>
<title>Suppliers</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
	<script type="text/javascript"> 

var i = 0; 
var path = "../controllers/images/Suppliers/"; 
var image_Array =[
path+"angiodynamics-logo.jpg",
path+"angioscore-logo.gif",	
path+"bardelecrohysiology-logo.jpg",
path+"medtronic-logo.jpg",
path+"meritmedical-logo.jpg",
path+"numed-logo.png",
path+"sedat-logo.jpg"];  

var caption = new Array(); 

// LIST OF CAPTIONS  

caption[0] = "AngioDynamics is a leading provider of innovative medical devices used by interventional radiologists, "+
"surgeons, and other physicians for the minimally invasive diagnosis and treatment of cancer and "+
"peripheral vascular disease."; 
caption[1] = "AngioScore Inc. develops, manufactures and markets the AngioSculpt Scoring Balloon Catheter for "+
"both the coronary and peripheral interventional markets. These markets represent a worldwide"+
" opportunity of over $2 billion. Designed specifically to address the limitations of conventional"+
" angioplasty balloon catheters, AngioSculpt combines a semi-compliant balloon with an innovative"+
" nitinol scoring element.";
caption[2] = "Bard-EP is a company rich in history, with a tradition of commitment to quality products and "+
"service and the customers and patients we serve. Our dedication to creating a global educational"+
" environment where todays distinguished medical thought leaders interact with the rising stars "+
" of the medical community is unwavering";
caption[3] = "Medtronic is the world leader in medical technology providing lifelong solutions for people with "+
"chronic disease. We offer products, therapies and services that enhance or extend the lives of "+
"millions of people. Each year, 6 million patients benefit from Medtronic's technology, used to"+
" treat conditions such as diabetes, heart disease, neurological disorders, and vascular illnesses"; 
caption[4] = "Merit Medical Systems, Inc. (Nasdaq: MMSI) is a leading manufacturer of medical devices used in"+
" diagnostic and interventional cardiology and radiology procedures "; 
caption[5] = "Since 1982, NuMED has been developing, manufacturing and delivering innovative cardiovascular "+
"medical products for the smallest of patients to adults with heart defects"; 
caption[6] = "Founded in 1950, SEDAT is an innovative French company belonging to the LABORATOIRES PEROUSE"+
" GROUP. Located in Lyon (France), SEDAT is dedicated to market its products worldwide. "+
" With a high expertise in healthcare environment, SEDAT is recognized for its efficiency "+
" and flexibility throughout the market. SEDAT has developed a strong partnership with major"+ 
" leading companies such as : Aventis Pasteur, Bio-Rad, B. Braun, CR Bard, Getz Bros, MedTron,"+ 
" Roche, Sanofi-Synthélabo, Unicef";

var el;
var i=0;
function swapImage(){ 
if (i == 7) { i = 0;}

el = document.getElementById("mydiv"); 
var il= document.getElementById("imageLink");
il.href=imagesLinks(i);		
var img= document.getElementById("slide"); 
img.src= image_Array[i];

setTimeout('changeCaption('+i+')',30);

if (i==0) {
var sideImage=document.getElementById("image6");
sideImage.border=0;
var sideImage2=document.getElementById("image0");
sideImage2.border=2;
}
else {
var sideImage=document.getElementById("image"+(i-1));
sideImage.border=0;
var sideImage2=document.getElementById("image"+i);
sideImage2.border=2;}

i++;
setTimeout("swapImage()",5000);
} 
function changeCaption(i){
	el.innerHTML=caption[i];
sideImages(i);	
}
function clicked(k){

for (m = 0; m < 7; m++) {
document.getElementById("image"+m).border=0;
}
i=k;
sideImage2=document.getElementById("image"+i);
sideImage2.border=2;

setTimeout('changeCaption('+i+')',30);

el = document.getElementById("mydiv"); 
var il= document.getElementById("imageLink");
il.href=imagesLinks(i);		
var img= document.getElementById("slide"); 
img.src= image_Array[i];
}

function imagesLinks(i)
{
var image_Link= new Array(); 
image_Link[0]="http://www.AngioDynamics.com";
image_Link[1]="http://www.AngioScore.com";
image_Link[2]="";
image_Link[3]="http://www.Medtronic.com";
image_Link[4]="http://www.Merit.com";
image_Link[5]="http://www.Numedforchildren.com";
image_Link[6]="http://www.Sedat.com";
return image_Link[i];
}

function addLoadEvent(func) { 
var oldonload = window.onload; 
if (typeof window.onload != 'function') { 
window.onload = func; 
} 
else { 
window.onload = function() { 
if (oldonload) { 
oldonload(); 
} 
func();}}}  
addLoadEvent(function() { 
swapImage(); });  

</script>
</head>
<body>
      <div class="allcontainer">
            <div id="page-header">
                <div class="page-logo">
<?php
include_once("../controllers/Header.php");
?> 
               
                </div>
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
            <span>Our Suppliers</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
 <font style="color:black;">We are proud that we deal only with the best Companies in the medical instruments industry:</font>
    </div>
<div  height="300px">
<table style="background-color:white; height:400px;" align="center" > 

<tr> 
<td> 
<div align="center">
<a id="imageLink">
<img name="slide" id="slide" alt ="suppliers" height="250" width="700"/> 
</a>
</div>
</td> 
<td rowspan=2 >
 
<a href="javascript:clicked(0);">
<img id=image0 height=50 width=150 src="../controllers/images/Suppliers/angiodynamics-logo.jpg"></a><br><br>
<a href="javascript:clicked(1);">
<img id=image1 height=50 width=150 src="../controllers/images/Suppliers/angioscore-logo.gif"></a><br><br>
<a href="javascript:clicked(2);">
<img id=image2 height=50 width=150 src="../controllers/images/Suppliers/bardelecrohysiology-logo.jpg"></a><br><br>
<a href="javascript:clicked(3);">
<img id=image3 height=50 width=150 src="../controllers/images/Suppliers/medtronic-logo.jpg"></a><br><br>
<a href="javascript:clicked(4);">
<img id=image4 height=50 width=150 src="../controllers/images/Suppliers/meritmedical-logo.jpg"></a><br><br>
<a href="javascript:clicked(5);">
<img id=image5 height=50 width=150 src="../controllers/images/Suppliers/numed-logo.png"></a><br><br>
<a href="javascript:clicked(6);">
<img id=image6 height=50 width=150 src="../controllers/images/Suppliers/sedat-logo.jpg"></a><br>

</td>
</tr>
<tr>
<font font="bold">
<td align="center"style="font-family: Century Gothic; font-size:20px ; color:black; "> 
<div id ="mydiv" ></div> 
</td> 
</font>
</tr>
</table> 
</div>
    </div>
</body>
<html>
