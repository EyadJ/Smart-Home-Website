<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } 

include_once("../models/device.php");

	$DeviceID = $_GET['DeviceID'];
	$newStatus = $_GET['newStatus'];

	$UserName = $_SESSION["UserName"];
	$isAdmin = $_SESSION["isAdmin"];
	
	//camera icon doesn't change status, only go to cameras page
	if(!device::isDeviceCamera($DeviceID) && ($newStatus == 0 || $newStatus == 1))
	{
		device::switchDeviceStatus($DeviceID, $newStatus, $UserName, $isAdmin);
		
		header("Location:../views/Rooms.php");
	}
	else //isCamera
	{	
		header("Location:../views/SecurityCameras.php");
	}
?>