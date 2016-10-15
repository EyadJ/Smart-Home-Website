<?php error_reporting(0); session_start(); ?>

<html>
<head>
<title>Home Page</title>
  <link href="../controllers/style.css" rel="stylesheet"/>
  
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

     <div class="table-hoder">
        <div class="personal-bg-table">
            <span>Home page</span>
            <div class="clearfix"></div>
            
     </div>

			<table style="max-width:660px;">				
			<tr><th colspan="3"><p></p></th></tr>

	<tr><th>-</th><td>	<h2 align="center"><font color="red">WELCOME To AMEESA MEDICAL</font> </h2></td><th>-</th></tr>
				<tr><th colspan="3"><p></p></th></tr>

	<tr><th>-</th><td>	<p align="center"><b>Ameesa Medical is a registered Saudi Arabian Company under Saudi Chamber of Commerce established in 1985.<br/>
The company plays an active part of interventional Cardiology and Cardiovascular and Radiology products since 1986 in the Saudi market.<br/>
Ameesa is well known in the Kingdom as the leading distributing company for Cath Lab supplies.<br/>
We also represent Medtronic as their sole agent and are the main distributors of Merit Medical, AngioScore, NuMED, AngioDynamic, and Sedat.<br/>
Our service is available through well trained specialized representatives all-over-the Kingdom and Bahrain.</p>
</td><th>-</th></tr>				<tr><th colspan="3"><p></p></th></tr>

</table>
         
		</div>

			<div class="clearfix"></div>
		   
			
			<table cellpadding="0" cellspacing="0" border="0" style="max-width:660px;">
			<tr>
			<td><img src="../controllers/images/title-services.jpg" style="width:100%;"></td>
			<td><img src="../controllers/images/title-profile.jpg" style="width:100%;"></td>
			</tr>
			
			<tr><td>
			<ul align="left">
			<li>Customer satisfaction is the primary and ultimate goal of Ameesa.</li>
			<li>Huge stock for fast delivery of all vascular procedures needs.</li>
			<li>Ameesa is the name that all cardiologists call for help in emergency vascular supply.</li>
			</ul>	
			</td>
			<td>
			<b><p>We supply all your vascular needs tools and accessories in Saudi Arabia and Bahrain</p></b>
			<ul align="left">
			<li>Coronary Stents (DES and BMS)</li>
			<li>Peripheral Stents for Renal & Illiac</li>
			<li>Billiary Stents</li>
			<li>Stent Grafts for AAA and TAA</li>
			</ul>
			</td></tr>

			</table>
			
				
        </div>
	</div>

</body>
</html>

