<?php

/**
 *
 */
require_once("config.php");

class Log
{
	public static function getAllLog($sqlOrderBy) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sqlOrderBy = $db->escape_string($sqlOrderBy); 
		
		//CHECK if user manuplated the GET veriable "Order"
		if($sqlOrderBy !== "ASC" && $sqlOrderBy !== "DESC") return NULL;
		
		$sql = "SELECT * FROM log l, log_category lc 
				WHERE l.RecordCategoryID = lc.RecordCategoryID 
				ORDER BY EntryDate $sqlOrderBy";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getLogCategories() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT RecordCategoryID, CategoryName, isImportant FROM log_category";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getNotificationCenterLog() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT * FROM log l, log_category lc 
				WHERE l.RecordCategoryID = lc.RecordCategoryID 
				AND l.RecordCategoryID IN (12, 13, 14, 21)
				ORDER BY EntryDate DESC";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getLogCount() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$sql = "SELECT COUNT(*) FROM log";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{	
			$row = $result->fetch_assoc();
			return $row["COUNT(*)"];
		}
		else 
			return 0;
	}
	
}








