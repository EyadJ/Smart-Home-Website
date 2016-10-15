<?php
	include_once("../models/Supplier.php");

	if(isset($_POST["deleted"]))
	{
		$deletedSuccessfully = Supplier::deleteSupplierByName($_GET['var']);
		
		echo '<html><body>'.
		'<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />'.
		'<form method="post" name="message" action=DeleteSupplierHandling.php>'.
		'<table border="3px" align="center" cellpadding="3px">'.
		'<tr><td align="center"><h3>' . $deletedSuccessfully . '</h3></td></tr>'.
		'<tr><td align="center">'.
		'<input type=submit name="messageRecieved" value="OK" style="width:70px;"/>'.
		'</td></tr></table></form>'.
		'</body</html>';	
	}
	
	if(isset($_POST["messageRecieved"]))
	{
		header("Location: ../views/ControlPanal.php");
	}
?>
