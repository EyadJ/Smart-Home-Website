<?php

include_once("../models/Device.php");

	$DeviceID = $_GET['DeviceID'];
	$newStatus = $_GET['newStatus'];

	Device::switchDeviceStatus($DeviceID, $newStatus);
	
	header("Location:../views/Rooms.php");
?>