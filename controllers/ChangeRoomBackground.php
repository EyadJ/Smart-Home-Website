<?php

	include_once("../models/room.php");

	$RoomID = $_GET["roomID"];
	$RoomName = $_GET["newBG"];

	room::modifyRoomImagePath($RoomID, $RoomName);

	header("Location: ../views/RoomSettings.php?var=$RoomID");

?>