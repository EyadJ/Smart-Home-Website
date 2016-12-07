<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }
  
	if (isset($_POST["Save"])) 
	{
		include_once("../models/task.php");
		include_once("../models/device.php");
		include_once("../models/sensor.php");
		
		//----------------------------initialization-------------------------------//
		$TaskID = $_POST["TaskID"];
		$UserID = $_POST["UserID"];
		$RoomID = $_POST["RoomID"];
		$TaskName = $_POST["TaskName"];
		$selectedSensorID = $_POST["sensors"];
		$referrer = $_POST["referrer"];
		
		$Devices; 				//(array)
		$AlarmDuration = -1;
		$AlarmInterval = -1;
		$ActionDate = NULL;
		$ActionTime = NULL;
		$EnableTaskOnTime = NULL;
		$DisableTaskOnTime = NULL;
		$repeatDaily = 1;
		$SelectedSensorTypeId = sensor::getSensorsTypeId($selectedSensorID);			// = $_POST["SelectedSensor"];
		$SelectedSensorValue = 0;
		$NotifyByEmail = 0;
		$isDisabled = 0;
		
		if(isset($_POST["NotifyByEmail"])) 
			$NotifyByEmail = 1;
		
		if(isset($_POST["EnableTaskOnTime"]) && isset($_POST["EnableTaskOnTimeValue"])) 
			$EnableTaskOnTime = $_POST["EnableTaskOnTimeValue"];
		
		if(isset($_POST["DisableTaskOnTime"]) && isset($_POST["DisableTaskOnTimeValue"])) 
			$DisableTaskOnTime = $_POST["DisableTaskOnTimeValue"];
			
		if(isset($_POST["isDisabled"])) 
			$isDisabled = 1;	
			
		//-------------------------SELECTED SENSOR CODE----------------------------//
		if($SelectedSensorTypeId == 10 || $SelectedSensorTypeId == 15) //Motion or IR
		{
			$MotionSensorOption = $_POST["MotionSensorOption"];
			
			if($MotionSensorOption == "onDetection")	//onDetection
				$SelectedSensorValue = -1;
				
			else if($MotionSensorOption == "onNoDetection")		//onNoDetection (after period of time)
				$SelectedSensorValue = $_POST["MotionSensorValue"]; //(Action after no detection for a period of time (Minutes))
		}
		else if($SelectedSensorTypeId == 11)	//Smoke
			$SelectedSensorValue = 0;

		else if($SelectedSensorTypeId == 12)	//Temperature
			$SelectedSensorValue = $_POST["TempSensorValue"];

		else if($SelectedSensorTypeId == 13)	//Light
			$SelectedSensorValue = $_POST["LightSensorValue"];

		else if($SelectedSensorTypeId == 14)	//UltraSonic
			$SelectedSensorValue = $_POST["UltraSonicSensorValue"];

		else if($SelectedSensorTypeId == 20)	//Clock
		{
			$ActionTime = $_POST["ActionTime"];
			$SelectedSensorValue = 0;
		}
		//-------------------------------------------------------------------------//
		
		if ($_POST["TaskOccurrence"] == "repeat") 
		{
			$repeatDaily = 1;
			$ActionDate = NULL; 
		}
		else if ($_POST["TaskOccurrence"] == "oneTime") 
		{
			$repeatDaily = 0;
			if($_POST["OneTimeAction"] == "Today")
			{
				$ActionDate = $_POST["TodayActionDate"];
			}
			else if ($_POST["OneTimeAction"] == "otherDate") 
			{
				$ActionDate = $_POST["ActionDate"];
			}
		}
		
		//----------------------------DEVICES----------------------------------//
		$result = device::getDevicesDetailsByRoomID($RoomID);
		
		$i = 0;
		while ($row = $result->fetch_assoc())
		{
			$currentDevID = $row["DeviceID"];
			$currentDevName = $row["DeviceName"];
			$isDeviceCamera = FALSE; 
			$TakeImagesQty = -1; 
			$TakeVideoDuration = -1; 
			$Resolution = -1; 
			
			$Devices[$i]["DevicesID"] = $currentDevID;
			$Devices[$i]["selectedDevicesStatus"] = $_POST[$currentDevID];
			
			//If device == Alarm
			if($currentDevName === "Alarm" && $Devices[$i]["selectedDevicesStatus"] == 1)
			{
				if(isset($_POST["AlarmDuration"]))	
					$AlarmDuration = $_POST["AlarmDuration"];
		
				if(isset($_POST["AlarmInterval"]))	
					$AlarmInterval = $_POST["AlarmInterval"];
			}
			//If device == Camera
			else if($currentDevName === "Security Camera")
			{
				$isDeviceCamera = TRUE; 
				
				$takeImgOrVideo = $_POST["cam-$currentDevID-takeImgOrVideo"];
				
				if($takeImgOrVideo === "Img")
					$TakeImagesQty = $_POST["cam-$currentDevID-TakeImagesQty"];
				
				else if($takeImgOrVideo === "Vid")
					$TakeVideoDuration = $_POST["cam-$currentDevID-TakeVideoDuration"];
				
				$Resolution = $_POST["cam-$currentDevID-Resolution"];
			}
			
			$Devices[$i]["isDeviceCamera"] = $isDeviceCamera;
			$Devices[$i]["TakeImagesQty"] = $TakeImagesQty;
			$Devices[$i]["TakeVideoDuration"] = $TakeVideoDuration;
			$Devices[$i]["Resolution"] = $Resolution;
			
			$i++;
		}
		//---------------------------------------------------------------------//
		
		task::UpdateTaskSettings
		($TaskID, $UserID, $RoomID, $TaskName, $ActionTime, $SelectedSensorValue, $repeatDaily, $ActionDate, $selectedSensorID, 
		$AlarmDuration, $AlarmInterval, $Devices, $NotifyByEmail, $EnableTaskOnTime, $DisableTaskOnTime, $isDisabled);
	
		header("Location: ../views/$referrer");
	}
		
		
		
?>