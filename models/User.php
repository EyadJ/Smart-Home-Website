<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class User
{
	
	public static function addNewUser($userName, $description, $email, $password, $isAdmin, $imgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('unable to connect to database [' . $db->connect_error .']');
		}

		/**
		 * in the following lines we escape quotation such as ' and "
		 */
		$userName = $db->escape_string($userName);
		$description = $db->escape_string($description);
		$email = $db->escape_string($email);
		$password = $db->escape_string($password);
		$isAdmin = $db->escape_string($isAdmin);
		$imgPath = $db->escape_string($imgPath);

		$sql = "INSERT INTO user (UserName, Description, Email, Password, isAdmin, UserImagePath) "
		  . " VALUES ('$userName', '$description', '$email', '$password', '$isAdmin', '$imgPath');";

		$db->query($sql);

		if ($db->affected_rows == 1) 
		{ // one record has been inserted to database successfully
		  return TRUE;
		} 
		else 
		{
		  die('unable to insert a new user into the database');
		}
	}

	public static function logInAttempt($email, $pass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$email = $db->escape_string($email);
		$pass = $db->escape_string($pass);
		$sql = "SELECT userID FROM user WHERE Email = '$email' AND Password = '$pass';";
		//var_dump($sql);
		
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 						
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}

	public static function getUserDetails($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT * FROM user WHERE Email = '$email'";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			
			return $row;
		}
		else 
		{
			return "couldn't find email";
		}
	}
	
	
	public static function getUsersDetails() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT * FROM user";
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

public static function deleteUser($UserName) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$UserName = $db->escape_string($UserName);
		
		$sql = "DELETE FROM user WHERE UserName = '$UserName';";
		
		$result = $db->query($sql);

		if ($result) //is true 
		{ 
			return "Deleted Successfully";
		} 
		else 
		{
			return "Problem Deleting User"; 
		}
	}

public static function getUserName($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT UserName FROM user WHERE Email = '$email';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$userName  = $row['UserName'];
			return $userName;
		}
		else 
		{
			return "couldn't find email";
		}
	}












}