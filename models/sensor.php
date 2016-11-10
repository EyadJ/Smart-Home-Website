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
				s.SensorTypeID = st.SensorTypeID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{ 			
			return $result;
		}
		else 
		{
			return NULL;
		}
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
		{
			return NULL;
		}
	}











}
