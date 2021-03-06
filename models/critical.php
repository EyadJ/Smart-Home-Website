<?php

require_once("config.php");

class Critical
{
	public static function isSmokeDetectorOn() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$sql = "SELECT SenesorState FROM sensor WHERE SensorTypeID = 11";		
		$result = $db->query($sql);

		$row = $result->fetch_assoc();
		$smokeDetectorState = $row["SenesorState"];
		 
		return $smokeDetectorState;		//TRUE OR FALSE
	}
	
	public static function isHouseParametersBreached() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$sql = "SELECT DeviceState FROM device WHERE DeviceName = 'Alarm' AND RoomID = 110";		
		$result = $db->query($sql);

		$row = $result->fetch_assoc();
		$AlarmState = $row["DeviceState"];
		 
		return $AlarmState;		//TRUE OR FALSE
	}
	
	public static function houseParametersSetNoRisk() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$sql = "UPDATE device SET DeviceState = 0 WHERE DeviceName = 'Alarm' AND RoomID = 110";
		
		if ($db->query($sql) == TRUE) 
			return TRUE;
		else
			return FALSE;
	}
}

?>