<?php


/**
 *
 */
require_once("config.php");

class User
{
	
	public static function addNewUser($userName, $Title, $email, $password, $imgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('unable to connect to database [' . $db->connect_error .']');
		}
		 //in the following lines we escape quotation such as ' and "
		 
		$userName = $db->escape_string($userName);
		$Title = $db->escape_string($Title);
		$email = $db->escape_string($email);
		$password = $db->escape_string($password);
		$imgPath = $db->escape_string($imgPath);

		$sql = "INSERT INTO user (UserName, Title, Email, Password, UserImagePath) "
		  . " VALUES ('$userName', '$Title', '$email', '$password', '$imgPath');";

		$db->query($sql);

		if ($db->affected_rows == 1) // one record has been inserted to database successfully
			return TRUE;
		else 
			return FALSE;
	}

	public static function logInAttempt($email, $pass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$email = $db->escape_string($email);
		$pass = $db->escape_string($pass);
		$sql = "SELECT UserID FROM user WHERE Email = '$email' AND Password = '$pass';";
		//var_dump($sql);
		
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return TRUE;
		else 
			return FALSE;
	}

	public static function getUserDetailsByID($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT * FROM user WHERE UserID = $UserID";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			return $row;
		}
		else 
			return NULL;
	}
	
	public static function getUsersDetails()
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT * FROM user";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}

	public static function deleteUser($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		
		$sql = "DELETE FROM user WHERE UserID = $UserID;";
		
		$result = $db->query($sql);

		if ($result) //is true 
			return TRUE;
		else 
			return FALSE; 
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
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$UserName  = $row['UserName'];
			return $UserName;
		}
		else 
			return NULL;
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
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$UserID  = $row['UserID'];
			return $UserID;
		}
		else 
			return NULL;
	}
	
	public static function isAdmin($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT isAdmin FROM user WHERE UserID = $UserID;";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$isAdmin  = $row['isAdmin'];
			
			return $isAdmin;
		}
		else 
			return FALSE;
	}	
	
	public static function isDisabled($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT isDisabled FROM user WHERE UserID = $UserID;";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{
			$row = $result->fetch_assoc();
			$isDisabled  = $row['isDisabled'];
			
			return $isDisabled;
		}
		else 
			return TRUE;
	}
	
	public static function getUserAutherisedRooms($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "SELECT * FROM room WHERE RoomID IN 
		(SELECT RoomID FROM user_authorized_rooms WHERE UserID = $UserID)";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return $result;
		else 
			return NULL;
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
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function isUserAutherisedToEditTask($UserID, $TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$UserID = $db->escape_string($UserID);
		$TaskID = $db->escape_string($TaskID);
		
		if(!user::isAdmin($UserID))		//if he isn't admin go in & check if he created the task
		{
			$sql = "SELECT UserID FROM task WHERE TaskID = $TaskID";
			
			$result = $db->query($sql);
			
			if($result != NULL && $result->num_rows >= 1)
			{
				$row = $result->fetch_assoc();
				
				if($UserID == $row["UserID"])
					return TRUE;
				else 
					return FALSE;
			}
			else
				return FALSE;	
		}
		else //isAdmin = Autherized
			return TRUE;
	}

	public static function modifyUserDetails ($UserID, $UserName, $Email, $Title, $Password, $isDisabled) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		//in the following lines we escape quotation such as ' and "
		$UserID = $db->escape_string($UserID);
		$UserName = $db->escape_string($UserName);
		$Email = $db->escape_string($Email);
		$Title = $db->escape_string($Title);
		$Password = $db->escape_string($Password);
		$isDisabled = $db->escape_string($isDisabled);

		$sql = "UPDATE user "
			. " SET UserName = '$UserName'" 
			. " ,Email = '$Email'" 
			. " ,Title = '$Title'" 
			. " ,Password = '$Password'" 
			. " ,isDisabled = $isDisabled" 
			. " WHERE UserID = $UserID;";

		if ($db->query($sql)) //TRUE
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function modifyUserImagePath ($UserID, $UserImagePath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		$UserImagePath = $db->escape_string($UserImagePath);
		
		$sql = "UPDATE user SET"
			. " UserImagePath = '$UserImagePath'" 
			. " WHERE UserID = $UserID;";

		if ($db->query($sql)) //TRUE
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function AuthoriseRoom($UserID, $RoomID)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "INSERT INTO user_authorized_rooms (UserID, RoomID)
		VALUES ($UserID, $RoomID);";

		$db->query($sql);

		if ($db->affected_rows == 1) 
			return TRUE;
		else 
			return FALSE;
	}

	public static function unAuthoriseRoom($UserID, $RoomID)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "DELETE FROM user_authorized_rooms WHERE 
		UserID = $UserID AND
		RoomID = $RoomID;";
		
		$result = $db->query($sql);

		if ($result) //is true 
			return TRUE;
		else 
			return FALSE; 
	}

	public static function getUsersWhoHasControlOfAllRoomsOfThisUser($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		$sql = "";
		
		if(!user::isAdmin($UserID))
		{
			$sql = "SELECT * FROM user WHERE UserID IN
			(SELECT UserID FROM user_authorized_rooms WHERE RoomID IN 
			(SELECT RoomID FROM user_authorized_rooms WHERE UserID = $UserID))";
		}
		else	//isAdmin
		{
			$sql = "SELECT * FROM user WHERE UserID IN
			(SELECT UserID FROM user_authorized_rooms)";
		}
		
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return $result;
		else 
			return NULL;
	}
	
	public static function getAdminUsers() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$sql = "SELECT * FROM user WHERE isAdmin = 1;";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return $result;
		else 
			return NULL;
	}
	
	
	
	
	




}
