<?php
	session_start();
	include_once("../models/user.php");

	if(isset($_GET["var"]))
	{
		$pId = $_GET["var"];
		$email = $_SESSION["Email"];
		
		$status = user::addProduct2Cart($email, $pId);
		
		header("Location:../views/ProductDetails.php?var=$pId&addedSuccessfuly=$status");
	}
?>
