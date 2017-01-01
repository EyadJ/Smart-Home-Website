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

		$sql = "SELECT * FROM device WHERE RoomID = '$RoomID' AND isVisible = 1";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function switchDeviceStatus($DeviceID, $newStatus, $UserName, $isAdmin) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$DeviceID = $db->escape_string($DeviceID);
		$newStatus = $db->escape_string($newStatus);
		
		//------------//
		//check for gas leaks before turning any device ON or OFF to not cause an explosion
		$sql = "SELECT SenesorState FROM sensor where SensorTypeID = 11";		
		$result = $db->query($sql);

		$row = $result->fetch_assoc();
		$smokeDetectorState = $row["SenesorState"];
		//------------//
		
		if(!$smokeDetectorState)
		{
			$sql = "UPDATE device SET "
				. "DeviceState = $newStatus, " 
				. "isStatusChanged = 1 " 
				. "WHERE DeviceID = $DeviceID;";

			if ($db->query($sql) == TRUE) 
			{
				//this table: (table_status) is updated to tell the Java system a change has occured, in order to increase performance
				//
				$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Device';");
				//--------------------------------------------------------------------------------------------------------------------
				
				$DeviceName = device::getDeviceName($DeviceID);
				$isDeviceMotor = device::isDeviceMotor($DeviceID);
				$RoomName = device::getRoomNameOfDevice($DeviceID);
				
				$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
				
				if(!$isDeviceMotor) // Normal Device (Not Motor)
				{
					$DeviceState = "ON"; if($newStatus == 0) $DeviceState = "OFF";
					
					//-----------------------------------LOG START-----------------------------------//
					$db->query("INSERT INTO log (RecordCategoryID, Description) "
						. " VALUES (23, '$AdminOrUser ($UserName) turned the ($DeviceName) [$DeviceState] in ($RoomName)')");
					//------------------------------------LOG END------------------------------------//
				}
				else // Device is Motor
				{
					$MotorState = "Opened"; if($newStatus == 0) $MotorState = "Closed";
					
					//-----------------------------------LOG START-----------------------------------//
					$db->query("INSERT INTO log (RecordCategoryID, Description) "
						. " VALUES (24, '$AdminOrUser ($UserName) [$MotorState] the ($DeviceName) in ($RoomName)')");
					//------------------------------------LOG END------------------------------------//
				}
				
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

		$sql = "SELECT DeviceName FROM device WHERE DeviceID = $DeviceID";
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
	
	//WHERE timestampField >= TO_TIMESTAMP( '2013-03-04', 'yyyy-mm-dd' )
	public static function getGalleryMultimediaForOneMonth() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT * FROM camera_gallery WHERE DeviceID = $DeviceID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function getAllGalleryMultimedia() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$sql = "SELECT * FROM camera_gallery ORDER BY imgDate DESC";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}

	//CHECK if the AC was turned OFF before a certin amount of time, 
	//ex: less than 3 minutes, to prevent user from turning it ON so it won't damage the AC
	public static function lastRunningTimeOfAC ($DeviceID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT lastStatusChange FROM device WHERE DeviceName='AC' AND DeviceID = $DeviceID";
		$result = $db->query($sql);
		
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result -> fetch_assoc();
			
			$lastStatusChange = strtotime($row["lastStatusChange"]);
			$now = time();
			
			$RemainingSeconds = $lastStatusChange - $now + 30;
			//$RemainingSeconds = $lastStatusChange - $now - 10800 + 30;
			
			if($RemainingSeconds > 30 || $RemainingSeconds < 0 )
				return 0;
			else
				return intval($RemainingSeconds);
		}
		else 
			return 0;
	}
	
	public static function isDeviceMotor($DeviceID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT DeviceName FROM device WHERE DeviceID = $DeviceID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result -> fetch_assoc();
			$DeviceName = $row["DeviceName"];
			
			if($DeviceName === "Curtains" || $DeviceName === "Garage Door")
				return TRUE;
			else
				return FALSE;
		}
		else 
			return FALSE;
	}
	
	public static function getDeviceName($DeviceID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT DeviceName FROM device WHERE DeviceID = $DeviceID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result -> fetch_assoc();
			return $row["DeviceName"];
		}
		else 
			return NULL;
	}
	
	public static function getRoomNameOfDevice($DeviceID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$DeviceID = $db->escape_string($DeviceID);

		$sql = "SELECT RoomName FROM room WHERE RoomID =
				(SELECT RoomID FROM device WHERE DeviceID = $DeviceID)";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result -> fetch_assoc();
			return $row["RoomName"];
		}
		else 
			return NULL;
	}





}
