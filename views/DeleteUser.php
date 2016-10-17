<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE ){  header("Location: Rooms.php"); } ?>


<html >
<head >
<title>Delete User</title>
   
    <link href="../controllers/style.css" rel="stylesheet"/>

	<script type="text/javascript">
	function getParameterByName(name, url) 
	{
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

	var UserName = getParameterByName('var');
	//alert(UserName);
	
	function confirmMessage()
	{
		var element = document.getElementById("message");
		var tagText = element.innerHTML;
		tagText = tagText + " (<u>" + UserName + "</u>) ?";
		element.innerHTML = tagText;
		document.getElementById("deleteForm").action = ("../controllers/DeleteUserHandling.php?var=" + UserName + "");
	}
	
	</script>
</head>
<body onload="confirmMessage();">
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
                 <a href="HomePage.php"><img height="80px;" src="../controllers/images/Capture.PNG"/></a>
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


     <div class="table-hoder">
        <div class="personal-bg-table">
            <span>Delete User</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  
  <form name='delete' method='post' id="deleteForm">
  
<table align="center" border="4" cellpadding="10" cellspacing="6" id="uniqe"  style="width:670px; height:100px;">

	<tr><td>
	<b><h3 id="message">Are you sure you want to delete User </h3></b>
	</td></tr>
		
	<tr><th>	
	<input type='submit' value='Delete' name='deleted'>
	<a href='ControlPanal.php'><button type='button'>Cancel</button></a>
	</th></tr>

		</table>
		</form>
                </div>

                <div class="clearfix">
                <br />
                <br />
                            </div>
    </div>
</body>
</html>
