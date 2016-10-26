<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }
  
  
	if (isset($_POST["Create"])) 
	{
			
		include_once("../models/task.php");
		include_once("../models/device.php");
		include_once("../models/sensor.php");
		
		//----------------------------initialization-------------------------------//
		$UserID = $_POST["UserID"];
		$RoomID = $_POST["RoomID"];
		$TaskName = $_POST["TaskName"];
		$selectedSensorID = $_POST["sensors"];
		$AlarmDuration = $_POST["AlarmDuration"];
		$AlarmInterval = $_POST["AlarmInterval"];
		$ActionTime = NULL;
		$ActionDate = NULL;
		$repeatDaily = 1;
		$SelectedSensorTypeId = sensor::getSensorsTypeId($selectedSensorID);			// = $_POST["SelectedSensor"];
		$SelectedSensorValue = 0;
		$devicesIDs; 				//(array)
		$selectedDevicesStatus; 	//(array)

		//-------------------------SELECTED SENSOR CODE----------------------------//
		if($SelectedSensorTypeId == 10)		//Motion
		{
			$MotionSensorOption = $_POST["MotionSensorOption"];
			
			if($MotionSensorOption == "onDetection")	//onDetection
			{
				$SelectedSensorValue = 0;
			}
			else if($MotionSensorOption == "onNoDetection")		//onNoDetection (after period of time)
			{
				$SelectedSensorValue = $_POST["MotionSensorValue"]; //(Action after no detection for a period of time (Minutes))
			}
		}
		else if($SelectedSensorTypeId == 11)	//Smoke
		{
			$SelectedSensorValue = 0;
		}
		else if($SelectedSensorTypeId == 12)	//Temperature
		{
			$SelectedSensorValue = $_POST["TempSensorValue"];
		}
		else if($SelectedSensorTypeId == 13)	//Light
		{
			$SelectedSensorValue = $_POST["LightSensorValue"];
		}
		else if($SelectedSensorTypeId == 20)	//Clock
		{
			$ActionTime = $_POST["ActionTime"];
			$SelectedSensorValue = 0;
		}
		//-------------------------------------------------------------------------//
		//
		//
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
		
		
		$result = device::getDevicesIdsByRoomID($RoomID);
		
		$i = 0;
		while ($row = $result->fetch_assoc())
		{
			$devicesIDs[$i] = $row["DeviceID"];
			//var_dump($devicesIDs[$i]);
			
			$selectedDevicesStatus[$i] = $_POST[$devicesIDs[$i]];
			
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
			$AlarmDuration,
			$AlarmInterval,
			$devicesIDs,
			$selectedDevicesStatus
			);
		
			header("Location: ../views/RoomSettings.php?var=$RoomID");
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
?>