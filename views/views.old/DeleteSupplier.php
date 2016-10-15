<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>


<html >
<head >
<title>Delete Supplier</title>
   
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

	var supplierName = getParameterByName('name');
	//alert(supplierName);
	
	function confirmMessage()
	{
		var element = document.getElementById("message");
		var tagText = element.innerHTML;
		tagText = tagText + " (<u>" + supplierName + "</u>) ?";
		element.innerHTML = tagText;
		document.getElementById("deleteForm").action = ("../controllers/DeleteSupplierHandling.php?var=" + supplierName + "");
	}
	
	</script>
</head>
<body onload="confirmMessage();">
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
            <span>Delete Supplier</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  
  <form name='delete' method='post' id="deleteForm">
  
<table align="center" border="4" cellpadding="10" cellspacing="6" id="uniqe"  style="width:670px; height:100px;">

	<tr><td>
	<b><h3 id="message">Are you sure you want to delete supplier </h3></b>
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
