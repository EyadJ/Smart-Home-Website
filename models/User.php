<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class User
{
	
	public static function addNewUser($userName, $description, $email, $password, $imgPath) 
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
		$imgPath = $db->escape_string($imgPath);

		$sql = "INSERT INTO user (UserName, Description, Email, Password, UserImagePath) "
		  . " VALUES ('$userName', '$description', '$email', '$password', '$imgPath');";

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

	public static function getUserDetailsByID($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT * FROM user WHERE userID = $UserID";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			
			return $row;
		}
		else 
		{
			return "couldn't find User ID";
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

public static function deleteUser($userID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$userID = $db->escape_string($userID);
		
		$sql = "DELETE FROM user WHERE userID = $userID;";
		
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

public static function getUserName($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT UserName FROM user WHERE UserID = '$UserID';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$UserName  = $row['UserName'];
			return $UserName	;
		}
		else 
		{
			return "couldn't find email";
		}
	}

public static function getIdByEmail($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT UserID FROM user WHERE Email = '$email';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$UserID  = $row['UserID'];
			return $UserID;
		}
		else 
		{
			return "couldn't find email";
		}
	}
	
public static function isAdmin($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT isAdmin FROM user WHERE UserID = '$UserID';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$isAdmin  = $row['isAdmin'];
			return $isAdmin;
		}
		else 
		{
			return "couldn't find email";
		}
	}


public static function getUserAutherisedRooms($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT * FROM room WHERE RoomID in 
		(SELECT RoomID FROM user_authorized_rooms WHERE UserID = '$UserID')";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			return $result;
		}
		else 
		{
			return NULL;
		}
	}

public static function isUserAutherisedForRoom($UserID, $RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "SELECT * FROM user_authorized_rooms 
				WHERE RoomID = $RoomID
				AND UserID = $UserID";

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

public static function modifyUserDetails 
($userID, $UserName, $Email, $Description, $Password) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		//in the following lines we escape quotation such as ' and "
		$userID = $db->escape_string($userID);
		$UserName = $db->escape_string($UserName);
		$Email = $db->escape_string($Email);
		$Description = $db->escape_string($Description);
		$Password = $db->escape_string($Password);

		$sql = "UPDATE user "
			. " SET UserName = '$UserName'" 
			. " ,Email = '$Email'" 
			. " ,Description = '$Description'" 
			. " ,Password = '$Password'" 
			. " WHERE userID = $userID;";

		if ($db->query($sql)) //TRUE
		{ 
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}
	
	public static function modifyUserImagePath ($userID, $UserImagePath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$UserImagePath = $db->escape_string($UserImagePath);
		
		$sql = "UPDATE user SET"
			. " UserImagePath = '$UserImagePath'" 
			. " WHERE userID = $userID;";

		if ($db->query($sql)) //TRUE
		{ 
			
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}
	







}
