<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Room
{
	
	public static function getRoomsDetails() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT * FROM room";
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

public static function getRoomName($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$RoomID = $db->escape_string($RoomID);
		$sql = "SELECT RoomName FROM room WHERE roomID = '$RoomID';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$RoomID = $row['RoomID'];
			return $RoomID;
		}
		else 
		{
			return "couldn't find room";
		}
	}












}
