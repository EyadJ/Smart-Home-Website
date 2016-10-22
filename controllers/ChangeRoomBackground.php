<?php

	include_once("../models/room.php");

	$RoomID = $_GET["roomID"];
	$RoomName = $_GET["newBG"];

	Room::modifyRoomImagePath($RoomID, $RoomName);

	header("Location: ../views/RoomSettings.php?var=$RoomID");

?>