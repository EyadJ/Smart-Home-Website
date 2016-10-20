<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Task
{
	
	public static function createNewTask($userID, $RoomID, $TaskName, $ActionTime, $Duration_Minute, $repeatDaily,
										 $SensorID, $DevicesID, $RequiredDevicesStatus) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		//
		//
		// FIRST INSERT (TABLE: task) //
		//
		$userID = $db->escape_string($userID);
		$RoomID = $db->escape_string($RoomID);
		$TaskName = $db->escape_string($TaskName);
		$ActionTime = $db->escape_string($ActionTime);
		$Duration_Minute = $db->escape_string($Duration_Minute);
		$repeatDaily = $db->escape_string($repeatDaily);
		
			$sql = "INSERT INTO task (userID, RoomID, TaskName, ActionTime, Duration_Minute, repeatDaily) "
		  . " VALUES ($userID, $RoomID, '$TaskName', '$ActionTime', $Duration_Minute, $repeatDaily);";
		//
		//
		// NEXT INSERT (TABLE: task_devices) //
		//
		$SensorID = $db->escape_string($SensorID);
		$DevID = $db->escape_string($DevicesID);  							//array
		$ReqDevState = $db->escape_string($RequiredDevicesStatus);  		//array
  
		if ($db->query($sql) === TRUE)   
		{
			$TaskID = $db->insert_id;
			$count = count($DevID); 
			 
			for($i = 0; $i < $count; $i++) 
			{
				$sql = "INSERT INTO task_devices VALUES "
					. "($TaskID, $SensorID, $DevID[$i], $ReqDevState[$i])";
					
					$db->query($sql);
			}
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}

public static function getAllTasksOfUser($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT * FROM task WHERE userID = $UserID";
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
