<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Sensor
{
	
	public static function getSensorsDetailsByRoomID($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$RoomID = $db->escape_string($RoomID);

		$sql = "SELECT * FROM sensor where RoomID = '$RoomID'";
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













}
