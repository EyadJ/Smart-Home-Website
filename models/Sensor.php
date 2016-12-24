<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class sensor
{
	
	public static function getSensorsDetailsByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$RoomID = $db->escape_string($RoomID);

		$sql = "SELECT * FROM sensor s, sensor_type st
				WHERE RoomID = '$RoomID' AND
				s.SensorTypeID = st.SensorTypeID AND 
				isVisible = 1";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}

	public static function getSensorsTypeId($SensorID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$SensorID = $db->escape_string($SensorID);

		$sql = "SELECT SensorTypeID FROM sensor
				WHERE SensorID = $SensorID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{ 	
			$row = $result->fetch_assoc();	
			return $row["SensorTypeID"];
		}
		else 
			return NULL;
	}

	
	public static function getTempSensorByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$RoomID = $db->escape_string($RoomID);

		$sql = "SELECT * FROM sensor s, sensor_type st
				WHERE s.RoomID = '$RoomID' AND
				s.SensorTypeID = st.SensorTypeID AND 
				s.SensorTypeID = 12";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();
			return $row["SensorValue"];
		}
		else 
			return NULL;
	}

	public static function getWaterTankLevel() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT SensorValue FROM sensor WHERE SensorID = 1002";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();
			
			$sensorValue = $row["SensorValue"];
			
			for($i = 16, $j = 0; $i > 5; $i--, $j += 10)
				$WaterTankLevel[$i] = $j;
		
			$waterTankLevelInPercentage = $WaterTankLevel[$sensorValue];

			return $waterTankLevelInPercentage;
		}
		else 
			return NULL;
	}



	
	
	






}
