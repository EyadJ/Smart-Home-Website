<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Task
{
	
	public static function createNewTask($UserID, $RoomID, $TaskName, $ActionTime, $Duration_Minute, $repeatDaily,
										 $ActionDate, $SensorID, $DevicesID, $RequiredDevicesStatus) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		//
		// FIRST INSERT (TABLE: task) //
		//
		$UserID = $db->escape_string($UserID); 
		$RoomID = $db->escape_string($RoomID);
		$SensorID = $db->escape_string($SensorID);
		$TaskName = $db->escape_string($TaskName);
		$Duration_Minute = $db->escape_string($Duration_Minute);
		$repeatDaily = $db->escape_string($repeatDaily);
		if ($ActionTime != NULL) $ActionTime = $db->escape_string($ActionTime);
		if ($ActionDate != NULL) $ActionDate = $db->escape_string($ActionDate);
		//
		//
		$sql="";

		if($ActionDate != NULL && $ActionTime != NULL)
		{
			$sql = "INSERT INTO task (userID, RoomID, SensorID, TaskName, ActionTime, Duration_Minute, repeatDaily, ActionDate) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', '$ActionTime', $Duration_Minute, $repeatDaily, '$ActionDate')";
		}
		else if ($ActionDate == NULL && $ActionTime != NULL)
		{
			$sql = "INSERT INTO task (userID, RoomID, SensorID, TaskName, ActionTime, Duration_Minute, repeatDaily) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', '$ActionTime', $Duration_Minute, $repeatDaily)";
		}
		else if ($ActionDate != NULL && $ActionTime == NULL)
		{
			$sql = "INSERT INTO task (userID, RoomID, SensorID, TaskName, Duration_Minute, repeatDaily, ActionDate) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', $Duration_Minute, $repeatDaily, '$ActionDate')";
		}
		else if ($ActionDate == NULL && $ActionTime == NULL)
		{
			$sql = "INSERT INTO task (userID, RoomID, SensorID, TaskName, Duration_Minute, repeatDaily) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', $Duration_Minute, $repeatDaily)";
		}
		
		//
		// NEXT INSERT (TABLE: task_devices) //
		//
		//escape_string for the entire array (in this case there is 2 arrays)
		for ($i = 0; $i < count($DevicesID); $i++) 
		{
			$DevID[$i] = $db->escape_string($DevicesID[$i]); 					//array
			$ReqDevState[$i] = $db->escape_string($RequiredDevicesStatus[$i]); 	//array
		}
		
		if ($db->query($sql))   
		{
			$newlyCreatedTaskID = $db->insert_id;
			$count = count($DevID); 
			 
			for($i = 0; $i < $count; $i++) 
			{
				$sql = "";
				
				if($ReqDevState[$i] != -1)
				{
					$sql = "INSERT INTO task_devices VALUES "
					. "($newlyCreatedTaskID, $DevID[$i], $ReqDevState[$i])";
				}
				else // == -1 
				{
					$sql = "INSERT INTO task_devices (TaskID, DeviceID) VALUES "
					. "($newlyCreatedTaskID, $DevID[$i])";
				}
				
				$db->query($sql);
			}
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}
	
	

	public static function getUserTasksForOneRoom($UserID, $RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT * FROM task WHERE 
				userID = $UserID AND RoomID = $RoomID";
				
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
	
			

	public static function getTaskDevices($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT * FROM task_devices 
				WHERE TaskID = $TaskID";
				
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
	
	public static function getAllTasksOfUser($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT * FROM task t, task_devices td
				WHERE userID = $UserID AND t.TaskID = td.TaskID";
				
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
