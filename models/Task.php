<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Task
{
	
	public static function createNewTask($UserID, $RoomID, $TaskName, $ActionTime, $SelectedSensorValue, $repeatDaily, $ActionDate, 
		$SensorID, $AlarmDuration, $AlarmInterval, $Devices, $NotifyByEmail, $EnableTaskOnTime, $DisableTaskOnTime, $UserName, $isAdmin) 
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
		if ($ActionDate != NULL) $ActionDate = $db->escape_string($ActionDate);
		if ($ActionTime != NULL) $ActionTime = $db->escape_string($ActionTime);
		if ($EnableTaskOnTime != NULL) $EnableTaskOnTime = $db->escape_string($EnableTaskOnTime);
		if ($DisableTaskOnTime != NULL) $DisableTaskOnTime = $db->escape_string($DisableTaskOnTime);
		
		//
		//Main insert
		$sql = "INSERT INTO task (UserID, RoomID, SensorID, TaskName, SelectedSensorValue, repeatDaily,	AlarmDuration, AlarmInterval, NotifyByEmail) "
			. " VALUES ($UserID, $RoomID, $SensorID, '$TaskName', $SelectedSensorValue, $repeatDaily, $AlarmDuration, $AlarmInterval, $NotifyByEmail)";
		
		if ($db->query($sql))   //if succefull, follow with multiple "optional" inserts
		{
			$newlyCreatedTaskID = $db->insert_id;
				
			if (isset($ActionDate))
				$db->query("UPDATE task SET ActionDate = '$ActionDate' WHERE TaskID = $newlyCreatedTaskID");

			if (isset($ActionTime))
				$db->query("UPDATE task SET ActionTime = '$ActionTime' WHERE TaskID = $newlyCreatedTaskID");
			
			if (isset($EnableTaskOnTime))
				$db->query("UPDATE task SET EnableTaskOnTime = '$EnableTaskOnTime' WHERE TaskID = $newlyCreatedTaskID");
			
			if (isset($DisableTaskOnTime))
				$db->query("UPDATE task SET DisableTaskOnTime = '$DisableTaskOnTime' WHERE TaskID = $newlyCreatedTaskID");
			
			//
			// NEXT INSERT - TABLE: task_devices 	&	 TABLE: task_camera (if applicable) //
			//
			//escape_string for the entire array
			$count = count($Devices);
			
			for ($i = 0; $i < $count; $i++) 
			{
				$Devices[$i]["DevicesID"] = $db->escape_string($Devices[$i]["DevicesID"]); 					
				$Devices[$i]["selectedDevicesStatus"] = $db->escape_string($Devices[$i]["selectedDevicesStatus"]); 					
				$Devices[$i]["isDeviceCamera"] = $db->escape_string($Devices[$i]["isDeviceCamera"]); 		
				$Devices[$i]["TakeImagesQty"] = $db->escape_string($Devices[$i]["TakeImagesQty"]); 					
				$Devices[$i]["TakeVideoDuration"] = $db->escape_string($Devices[$i]["TakeVideoDuration"]); 					
				$Devices[$i]["Resolution"] = $db->escape_string($Devices[$i]["Resolution"]); 					
			}
			
			for($i = 0; $i < $count; $i++) 
			{
				$DevID = $Devices[$i]["DevicesID"];
				$ReqDevState = $Devices[$i]["selectedDevicesStatus"];
				$isDeviceCamera = $Devices[$i]["isDeviceCamera"];
				$TakeImagesQty = $Devices[$i]["TakeImagesQty"];
				$TakeVideoDuration = $Devices[$i]["TakeVideoDuration"];
				$Resolution = $Devices[$i]["Resolution"];
				
				if(!$isDeviceCamera)
				{
					$sql = "INSERT INTO task_devices VALUES ($newlyCreatedTaskID, $DevID, $ReqDevState)";
					$db->query($sql);
				}
				else  //Device is Camera
				{
					if ($ReqDevState != 1){ $TakeImagesQty = -1; $TakeVideoDuration = -1; $Resolution = -1; }
						
					$sql = "INSERT INTO task_camera VALUES ($newlyCreatedTaskID, $DevID, $ReqDevState, $TakeImagesQty, $TakeVideoDuration, $Resolution)";
					$db->query($sql);
				}
			}
			//this table: (table_status) is updated to tell the Java system a change has occured, in order to increase performance
			//
			$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Task';");
			//--------------------------------------------------------------------------------------------------------------------
			
			
			//-------------------------------------------------LOG START-------------------------------------------------//
			$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
			
			//-----------------------Get Room Name---------------------------------//
			$result = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
			$row = $result -> fetch_assoc();
		
			$RoomName = $row["RoomName"];
			//---------------------------------------------------------------------//
		
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (25, '$AdminOrUser ($UserName) created a task with name ($TaskName) in room ($RoomName)')");
			//-------------------------------------------------LOG END-------------------------------------------------//
			
			return TRUE;
		}
		else 
			return FALSE;
	}
	
	public static function UpdateTaskSettings($TaskID, $UserID, $RoomID, $TaskName, $ActionTime, $SelectedSensorValue, $repeatDaily, $ActionDate, 
		$SensorID, $AlarmDuration, $AlarmInterval, $Devices, $NotifyByEmail, $EnableTaskOnTime, $DisableTaskOnTime, $isDisabled, $UserName, $isAdmin) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		//
		// FIRST INSERT (TABLE: task) //
		//
		$TaskID = $db->escape_string($TaskID); 
		$UserID = $db->escape_string($UserID); 
		$RoomID = $db->escape_string($RoomID);
		$SensorID = $db->escape_string($SensorID);
		$TaskName = $db->escape_string($TaskName);
		$SelectedSensorValue = $db->escape_string($SelectedSensorValue);
		$repeatDaily = $db->escape_string($repeatDaily);
		$AlarmDuration = $db->escape_string($AlarmDuration);
		$AlarmInterval = $db->escape_string($AlarmInterval);
		$NotifyByEmail = $db->escape_string($NotifyByEmail);
		$isDisabled = $db->escape_string($isDisabled);
		if ($ActionDate != NULL) $ActionDate = $db->escape_string($ActionDate);
		if ($ActionTime != NULL) $ActionTime = $db->escape_string($ActionTime);
		if ($EnableTaskOnTime != NULL) $EnableTaskOnTime = $db->escape_string($EnableTaskOnTime);
		if ($DisableTaskOnTime != NULL) $DisableTaskOnTime = $db->escape_string($DisableTaskOnTime);
		

		$deleteSuccessful = task::deleteTaskBeforeUpdate($TaskID);
		
		if($deleteSuccessful)
		{
		$sql = "INSERT INTO task (TaskID, UserID, RoomID, SensorID, TaskName, SelectedSensorValue, repeatDaily,	AlarmDuration, AlarmInterval, NotifyByEmail, isDisabled) "
			. " VALUES ($TaskID, $UserID, $RoomID, $SensorID, '$TaskName', $SelectedSensorValue, $repeatDaily, $AlarmDuration, $AlarmInterval, $NotifyByEmail, $isDisabled)";
		
			if ($db->query($sql))   //if successfull, follow with multiple "optional" inserts
			{
				if (isset($ActionDate))
					$db->query("UPDATE task SET ActionDate = '$ActionDate' WHERE TaskID = $TaskID");

				if (isset($ActionTime))
					$db->query("UPDATE task SET ActionTime = '$ActionTime' WHERE TaskID = $TaskID");
				
				if (isset($EnableTaskOnTime))
					$db->query("UPDATE task SET EnableTaskOnTime = '$EnableTaskOnTime' WHERE TaskID = $TaskID");
				
				if (isset($DisableTaskOnTime))
					$db->query("UPDATE task SET DisableTaskOnTime = '$DisableTaskOnTime' WHERE TaskID = $TaskID");
				
				//
				// NEXT INSERT - TABLE: task_devices 	&	 TABLE: task_camera (if applicable) //
				//
				
				$count = count($Devices);
				
				//escape_string for the entire array
				for ($i = 0; $i < $count; $i++) 
				{
					$Devices[$i]["DevicesID"] = $db->escape_string($Devices[$i]["DevicesID"]); 					
					$Devices[$i]["selectedDevicesStatus"] = $db->escape_string($Devices[$i]["selectedDevicesStatus"]); 					
					$Devices[$i]["isDeviceCamera"] = $db->escape_string($Devices[$i]["isDeviceCamera"]); 		
					$Devices[$i]["TakeImagesQty"] = $db->escape_string($Devices[$i]["TakeImagesQty"]); 					
					$Devices[$i]["TakeVideoDuration"] = $db->escape_string($Devices[$i]["TakeVideoDuration"]); 					
					$Devices[$i]["Resolution"] = $db->escape_string($Devices[$i]["Resolution"]); 					
				}
				
				for($i = 0; $i < $count; $i++) 
				{
					$DevID = $Devices[$i]["DevicesID"];
					$ReqDevState = $Devices[$i]["selectedDevicesStatus"];
					$isDeviceCamera = $Devices[$i]["isDeviceCamera"];
					$TakeImagesQty = $Devices[$i]["TakeImagesQty"];
					$TakeVideoDuration = $Devices[$i]["TakeVideoDuration"];
					$Resolution = $Devices[$i]["Resolution"];
					
					if(!$isDeviceCamera)
					{
						$sql = "INSERT INTO task_devices VALUES ($TaskID, $DevID, $ReqDevState)";
						$db->query($sql);
					}
					else  //Device is Camera
					{
						if ($ReqDevState != 1){ $TakeImagesQty = -1; $TakeVideoDuration = -1; $Resolution = -1; }
							
						$sql = "INSERT INTO task_camera VALUES ($TaskID, $DevID, $ReqDevState, $TakeImagesQty, $TakeVideoDuration, $Resolution)";
						$db->query($sql);
					}
				}
				//this table: (table_status) is updated to tell the Java system a change has occured, in order to increase performance
				//
				$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Task';");
				//--------------------------------------------------------------------------------------------------------------------
				
				
				//-------------------------------------------------LOG START-------------------------------------------------//
				$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
				
				//-----------------------Get Room Name---------------------------------//
				$result = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
				$row = $result -> fetch_assoc();
			
				$RoomName = $row["RoomName"];
				//---------------------------------------------------------------------//
			
				$db->query("INSERT INTO log (RecordCategoryID, Description) "
						. " VALUES (26, '$AdminOrUser ($UserName) edited task ($TaskName) in room ($RoomName)')");
				//-------------------------------------------------LOG END-------------------------------------------------//
				
				return TRUE;
			}
			else 
				return FALSE;
		}
		else
			return FALSE;
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
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	
	public static function getAllUsersTasksForOneRoom($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "SELECT * FROM task WHERE RoomID = $RoomID AND isDeleted = 0";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getAllUsersEnabledTasksForOneRoom($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "SELECT * FROM task WHERE RoomID = $RoomID AND isDeleted = 0 AND isDisabled = 0";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}

	public static function getTaskDevices($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT * FROM task_devices WHERE TaskID = $TaskID";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getTaskCameras($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT * FROM task_camera WHERE TaskID = $TaskID";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getAllTasksOfUser($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT * FROM task t, task_devices td
				WHERE UserID = $UserID AND t.TaskID = td.TaskID AND isDeleted = 0";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
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
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();	
			
			if($row["isDefault"] == 1) return TRUE;
			else if($row["isDefault"] == 0) return FALSE;	
		}
		else 
			return FALSE;
	}
	
	public static function deleteTask($TaskID, $UserName, $isAdmin) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$TaskID = $db->escape_string($TaskID);
		
		$TaskName = task::getTaskName($TaskID);
		$RoomID = task::getRoomIdByTaskId($TaskID);
		
		if(task::isDefault($TaskID)) return FALSE; //isDefault Task is not deletable (only disablable)
	
		$sql = "DELETE FROM task_devices WHERE TaskID = $TaskID;";
		$result = $db->query($sql);
		
		$sql = "DELETE FROM task_camera WHERE TaskID = $TaskID;";
		$result2 = $db->query($sql);
		
		if ($result && $result2) //is true 
		{
			$sql = "DELETE FROM task WHERE TaskID = $TaskID;";
			$result3 = $db->query($sql);
			
			//this table: (table_status) is updated to tell the Java system a change has occured, in order to increase performance
			//
			$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Task';");
			//--------------------------------------------------------------------------------------------------------------------
			
			
			//-------------------------------------------------LOG START-------------------------------------------------//
			$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
			
			//-----------------------Get Room Name---------------------------------//
			$result4 = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
			$row = $result4 -> fetch_assoc();
		
			$RoomName = $row["RoomName"];
			//---------------------------------------------------------------------//
		
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (27, '$AdminOrUser ($UserName) deleted task ($TaskName) from room ($RoomName)')");
			//-------------------------------------------------LOG END-------------------------------------------------//
			
			return TRUE;
		} 
		else 
			return FALSE; 
	}
	
	public static function removeTask($TaskID, $UserName, $isAdmin) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$TaskID = $db->escape_string($TaskID);
		
		if(task::isDefault($TaskID)) return FALSE; //isDefault Task is not deletable (only disableble)
	
		$sql = "UPDATE task SET isDeleted = 1 WHERE TaskID = $TaskID;";
		$result = $db->query($sql);
		
		if ($result)
		{
			//this table: (table_status) is updated to tell the Java system a change has occured, in order to increase performance
			//
			$db->query("UPDATE table_status SET isTableUpdated = 1 WHERE TableName = 'Task';");
			//--------------------------------------------------------------------------------------------------------------------
			
			
			//-------------------------------------------------LOG START-------------------------------------------------//
			$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
			$TaskName = task::getTaskName($TaskID);
			$RoomID = task::getRoomIdByTaskId($TaskID);
			
			//-----------------------Get Room Name---------------------------------//
			$result2 = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
			$row = $result2 -> fetch_assoc();
		
			$RoomName = $row["RoomName"];
			//---------------------------------------------------------------------//
		
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (27, '$AdminOrUser ($UserName) deleted task ($TaskName) from room ($RoomName)')");
			//-------------------------------------------------LOG END-------------------------------------------------//
			
			return TRUE;
		}
		else
			return FALSE; 
	}

	public static function deleteTaskBeforeUpdate($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$TaskID = $db->escape_string($TaskID);
	
		$result = $db->query("DELETE FROM task_devices WHERE TaskID = $TaskID;");
		
		$result2 = $db->query("DELETE FROM task_camera WHERE TaskID = $TaskID;");
		
		if ($result && $result2) //is true 
		{
			$db->query("DELETE FROM task WHERE TaskID = $TaskID;");
			
			return TRUE;
		} 
		else 
			return FALSE; 
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
		
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();
			
			return $row["RoomID"];
		}
		else 
			return NULL;
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
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getTaskName($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$TaskID = $db->escape_string($TaskID);

		$sql = "SELECT TaskName FROM task WHERE TaskID = $TaskID";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();	
			
			return $row["TaskName"];
		}
		else 
			return FALSE;
	}






}
