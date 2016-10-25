<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }
  
  
	if (isset($_POST["Create"])) 
	{
			
		include_once("../models/task.php");
		include_once("../models/device.php");
		
		$UserID = $_POST["UserID"];
		$RoomID = $_POST["RoomID"];
		$TaskName = $_POST["TaskName"];
		$selectedSensorID = $_POST["sensors"];
		$SelectedSensorValue = $_POST["SelectedSensorValue"];
		//---------//
		//
		$ActionTime;
		if (!isset($_POST["ActionTime"]) || strlen($_POST["ActionTime"]) == 0) 
			$ActionTime = NULL;
		else 
			$ActionTime = $_POST["ActionTime"];
		//
		//---------//
		//
		$repeatDaily;
		if (isset($_POST["repeatDaily"])) 
		{
			$repeatDaily = 1;
			$ActionDate = NULL; 
		}
		else 
		{
			$repeatDaily = 0;
			$ActionDate = $_POST["ActionDate"];	
		}
		//
		//
		//$devicesIDs (array)
		//$selectedDevicesStatus (array)
		
		$result = device::getDevicesIDsByRoomID($RoomID);
		
		$i = 0;
		while ($row = $result->fetch_assoc())
		{
			$devicesIDs[$i] = $row["DeviceID"];
			$selectedDevicesStatus[$i] = $_POST["$row[DeviceID]"];
			
			$i++;
		}
		
			task::createNewTask
			(
			$UserID,
			$RoomID,
			$TaskName,
			$ActionTime,
			$SelectedSensorValue,
			$repeatDaily,
			$ActionDate,
			$selectedSensorID,
			$devicesIDs,
			$selectedDevicesStatus
			);
		
			header("Location: ../views/RoomSettings.php?var=$RoomID");
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
?>