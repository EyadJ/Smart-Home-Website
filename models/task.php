<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Task
{
	
	public static function createNewTask($UserID, $RoomID, $TaskName, $ActionTime, $SelectedSensorValue, $repeatDaily, $ActionDate, 
										$SensorID, $AlarmDuration, $AlarmInterval, $DevicesID, $RequiredDevicesStatus, $NotifyByEmail) 
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
		$SelectedSensorValue = $db->escape_string($SelectedSensorValue);
		$repeatDaily = $db->escape_string($repeatDaily);
		$AlarmDuration = $db->escape_string($AlarmDuration);
		$AlarmInterval = $db->escape_string($AlarmInterval);
		$NotifyByEmail = $db->escape_string($NotifyByEmail);
		if ($ActionTime != NULL) $ActionTime = $db->escape_string($ActionTime);
		if ($ActionDate != NULL) $ActionDate = $db->escape_string($ActionDate);
		//
		//
		$sql="";

		if($ActionDate != NULL && $ActionTime != NULL)
		{
			$sql = "INSERT INTO task 
			(UserID, RoomID, SensorID, TaskName, ActionTime, SelectedSensorValue, repeatDaily,
			ActionDate, AlarmDuration, AlarmInterval, NotifyByEmail) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', '$ActionTime', $SelectedSensorValue,
		  $repeatDaily, '$ActionDate', $AlarmDuration, $AlarmInterval, $NotifyByEmail)";
		}
		else if ($ActionDate == NULL && $ActionTime != NULL)
		{
			$sql = "INSERT INTO task (UserID, RoomID, SensorID, TaskName, ActionTime, SelectedSensorValue,
			repeatDaily, AlarmDuration, AlarmInterval, NotifyByEmail) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', '$ActionTime', $SelectedSensorValue, 
		  $repeatDaily, $AlarmDuration, $AlarmInterval, $NotifyByEmail)";
		}
		else if ($ActionDate != NULL && $ActionTime == NULL)
		{
			$sql = "INSERT INTO task (UserID, RoomID, SensorID, TaskName, SelectedSensorValue, repeatDaily,
			ActionDate, AlarmDuration, AlarmInterval, NotifyByEmail) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', $SelectedSensorValue, $repeatDaily,
		  '$ActionDate', $AlarmDuration, $AlarmInterval, $NotifyByEmail)";
		}
		else if ($ActionDate == NULL && $ActionTime == NULL)
		{
			$sql = "INSERT INTO task (UserID, RoomID, SensorID, TaskName, SelectedSensorValue, repeatDaily,
			AlarmDuration, AlarmInterval, NotifyByEmail) "
		  . " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', $SelectedSensorValue, $repeatDaily, 
		  $AlarmDuration, $AlarmInterval, $NotifyByEmail)";
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
				$sql = "INSERT INTO task_devices VALUES "
				. "($newlyCreatedTaskID, $DevID[$i], $ReqDevState[$i])";
			
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
				UserID = $UserID AND RoomID = $RoomID";
				
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
	
	
	public static function getAllUsersTasksForOneRoom($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "SELECT * FROM task WHERE RoomID = $RoomID";
				
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
				WHERE UserID = $UserID AND t.TaskID = td.TaskID";
				
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

	public static function isDefault($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$TaskID = $db->escape_string($TaskID);

		$sql = "SELECT isDefault FROM task WHERE TaskID = $TaskID";
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();	
			
			if($row["isDefault"] == 1) return TRUE;
			else if($row["isDefault"] == 0) return FALSE;	
		}
		else 
		{
			return FALSE;
		}
	}
	
	public static function deleteTask($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$TaskID = $db->escape_string($TaskID);
		
		if(task::isDefault($TaskID)) return FALSE; //isDefault Task is not deletable (only disablable)
	
		$sql = "DELETE FROM task_devices WHERE TaskID = $TaskID;";
		$result = $db->query($sql);
		
		if ($result) //is true 
		{
			$sql = "DELETE FROM task WHERE TaskID = $TaskID;";
			$result = $db->query($sql);

			return TRUE;
		} 
		else 
		{
			return FALSE; 
		}
	}

	public static function getRoomIdByTaskId($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT RoomID FROM task WHERE TaskID = $TaskID";
				
		$result = $db->query($sql);
		
		if ($result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();
			$RoomID = $row["RoomID"];
		
			return $RoomID;
		}
		else 
		{
			return NULL;
		}
	}
	
	public static function getOneTask($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT * FROM task WHERE TaskID = $TaskID";
				
		$result = $db->query($sql);
	 
		if ($result->num_rows == 1)  
		{ 			
			return $result;
		}
		else 
		{
			return NULL;
		}
	}
	







}
