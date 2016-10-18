<?php

	include_once("../models/Room.php");

	$RoomID = $_GET["roomID"];
	$RoomName = $_GET["newBG"];

	Room::deleteRoomBackground($RoomID, $RoomName);

	header("Location: ../views/RoomSettings.php?var=$RoomID");

?>