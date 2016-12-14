<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }

	include_once("../models/room.php");

	$RoomID = $_GET["roomID"];
	$RoomName = $_GET["newBG"];

	room::modifyRoomImagePath($RoomID, $RoomName);

	header("Location: ../views/RoomSettings.php?var=$RoomID");

?>