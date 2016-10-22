<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: HomePage.php"); }


	include_once("../models/user.php");

	if(isset($_POST["deleted"]))
	{
		$deletedSuccessfully = User::deleteUser($_GET['var']);
		
		echo '<html><body>'.
		'<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />'.
		'<form method="post" name="message" action=DeleteUserHandling.php>'.
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
