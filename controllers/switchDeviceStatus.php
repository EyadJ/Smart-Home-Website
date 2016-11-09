<?php

include_once("../models/device.php");

	$DeviceID = $_GET['DeviceID'];
	$newStatus = $_GET['newStatus'];

	//camera icon doesn't change status, only go to cameras page
	if(!device::isDeviceCamera($DeviceID))
	{
		device::switchDeviceStatus($DeviceID, $newStatus);
		
		header("Location:../views/Rooms.php");
	}
	else //isCamera
	{	
		header("Location:../views/SecurityCameras.php");
	}
?>