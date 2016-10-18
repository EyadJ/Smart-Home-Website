<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Rooms.php"); } ?>

<html >
<head >
<title>Control Panal</title>
   
    <link href="../controllers/style.css" rel="stylesheet"/>

</head>
<body>

<div id="mainDialog">

</div>

           <div class="allcontainer">
	 <img src="../controllers/images/smarthome-background.jpg"
			style="width:100%; position:fixed; top:40px;" /> 
<div id="page-header">
                <div class="page-logo">
<?php
include_once("../controllers/SessionInfo.php");
?> 
                     </div>
                <div class="page-logo2">
                 <a href="HomePage.php"><a href="HomePage.php"><img height="80px;" src="../controllers/images/Capture.PNG"/></a></a>
                </div>
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
            <span>Control Panal</span>
            <hr class="hr-table" />
        </div>
  
	<div style=" margin-left:auto; margin-right:auto; width:50px;">
			
		<a class="tooltip" href="addUser.php" style="text-decoration:none; ">
			
				<span class="tooltiptext">Add new user</span>
			<img align="center" src="../controllers/images/addUser4.png" width="60" height="60" />
			
		</a>
		
	</div>
    
    <form method="post">
    
<table >
<thead><tr>
<th width="20%" >Img</th>
<th width="30%" >Name</th>
<th width="10%" >Rooms<br />Authorisation</th>
<th width="10%" >Modify User Settings</th>
<th width="10%" >Delete<br />User</th>
</tr></thead>

<?php
 include_once("../controllers/PreControlPanal.php");
?>

</table>
</form>
	

		<div class="clearfix">
		<br />
		<br />
					</div>
	</form>
    </div>
</body>
</html>
