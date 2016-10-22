<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Device
{
	
	public static function getDevicesDetailsByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$RoomID = $db->escape_string($RoomID);

		//echo $RoomID;
		$sql = "SELECT * FROM device where RoomID = '$RoomID'";
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  
		{ 			
			return $result;
		}
		else 
		{
			return NULL;
		}
	}
	
	public static function getDevicesIDsByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$RoomID = $db->escape_string($RoomID);

		//echo $RoomID;
		$sql = "SELECT DeviceID FROM device where RoomID = '$RoomID'";
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  
		{ 			
			return $result;
		}
		else 
		{
			return NULL;
		}
	}

public static function switchDeviceStatus($DeviceID, $newStatus) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$DeviceID = $db->escape_string($DeviceID);
		$newStatus = $db->escape_string($newStatus);
	
		$sql = "UPDATE device SET "
			. " DeviceState = $newStatus" 
			. ",isStatusChanged = 1" 
			. " WHERE DeviceID = $DeviceID;";

		if ($db->query($sql) == TRUE) 
		{ 
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}
	










}
