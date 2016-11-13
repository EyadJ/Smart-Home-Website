<?php

/**
 *
 */
require_once("config.php");
require_once("critical.php");

class Device
{
	
	public static function getDevicesDetailsByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$RoomID = $db->escape_string($RoomID);

		$sql = "SELECT * FROM device where RoomID = '$RoomID'";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function switchDeviceStatus($DeviceID, $newStatus) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		//------------//
		//check for gas leaks before turning any device ON or OFF to not cause an explosion
		$sql = "SELECT SenesorState FROM sensor where SensorTypeID = 11";		
		$result = $db->query($sql);

		$row = $result->fetch_assoc();
		$smokeDetectorState = $row["SenesorState"];
		//------------//
		
		if(!$smokeDetectorState)
		{
			$DeviceID = $db->escape_string($DeviceID);
			$newStatus = $db->escape_string($newStatus);
		
			$sql = "UPDATE device SET "
				. " DeviceState = $newStatus" 
				. ",isStatusChanged = 1" 
				. " WHERE DeviceID = $DeviceID;";

			if ($db->query($sql) == TRUE) 
			{
				$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Device';");
				
				return TRUE;
			}
			else 
				return FALSE;
		}
		else
			return FALSE;
	}
	
	public static function isDeviceCamera($DeviceID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT DeviceName FROM device where DeviceID = $DeviceID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result -> fetch_assoc();
			
			if($row["DeviceName"] === "Security Camera")
				return TRUE;
			else
				return FALSE;
		}
		else 
			return FALSE;
	}









}
