<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Task
{
	
	public static function createNewTask() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		//$ = $db->escape_string($);
		//$ = $db->escape_string($);
		//$ = $db->escape_string($);
		//$ = $db->escape_string($);
		//$ = $db->escape_string($);

		//$sql = "";
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  
		{ 			
			//return TRUE;
		}
		else 
		{
			//return FALSE;
		}
	}













}
