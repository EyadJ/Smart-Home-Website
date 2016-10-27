<?php

include_once("../models/user.php");

	$UserID = $_GET['var'];
	$RoomID = $_GET['var2'];
	$newStatus = $_GET['var3'];

	if($newStatus == "Authorise")
	{
		user::AuthoriseRoom($UserID, $RoomID);
	}
	else if($newStatus == "unAuthorise")
	{
		user::unAuthoriseRoom($UserID, $RoomID);
	}
	
	header("Location:../views/UserAuthorisedRooms.php?var=$UserID");
?>