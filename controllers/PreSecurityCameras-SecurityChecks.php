<?php
	
	include_once("../models/user.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];

	if(!$isAdmin && !user::isUserAutherisedForRoom($UserID, 110))
		header("Location:../views/Rooms.php"); 

?>
