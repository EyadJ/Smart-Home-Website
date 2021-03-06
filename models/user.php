<?php


/**
 *
 */
require_once("config.php");

class User
{
	public static function addNewUser($userName, $Title, $email, $CellPhone, $password, $AdminUserName) 
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
		$CellPhone = $db->escape_string($CellPhone);
		$password = $db->escape_string($password);
		$AdminUserName = $db->escape_string($AdminUserName);

		$password = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "INSERT INTO user (UserName, Title, Email, CellPhone, Password) "
		  . " VALUES ('$userName', '$Title', '$email', $CellPhone, '$password')";
		  
		$db->query($sql);
		
		if ($db->affected_rows == 1) // one record has been inserted to database successfully
		{
			$NewlyCreatedUserID = $db->insert_id;

			//-----------------------------------LOG START-----------------------------------//
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (15, 'Admin ($AdminUserName) added a new user ($userName)')");
			//------------------------------------LOG END------------------------------------//
			return $NewlyCreatedUserID;
		}
		else 
			return NULL;
	}

	public static function logInAttempt($email, $pass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$email = $db->escape_string($email);
		$pass = $db->escape_string($pass);
		 
		$isPassCorrect = user::isPasswordCorrect($email, $pass);
		$ip_address = $_SERVER['REMOTE_ADDR'];
		
		if ($isPassCorrect)  // password is correct
		{
			$db->query("DELETE FROM system_settings WHERE logInAttempt_IP = '$ip_address';");
			
			//-----------------------------------LOG START-----------------------------------//
			$UserID = user::getIdByEmail($email);
			$UserName = user::getUserName($UserID);
			$isAdmin = user::isAdmin($UserID);
		
			$UserOrAdmin = "User";
			if($isAdmin) $UserOrAdmin = "Admin";
			
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (22, '$UserOrAdmin ($UserName) has successfully logged in')");
					
			//------------------------------------LOG END------------------------------------//
			return TRUE;
		}
		else // password is NOT correct (security to restrict same IP address from brute-forcing)
		{
			$sql = "SELECT * FROM system_settings WHERE logInAttempt_IP = '$ip_address';";
			$result = $db->query($sql);
		
			if ($result != NULL && $result->num_rows >= 1)  // ip exists
			{
				$row = $result -> fetch_assoc();
				$recordID = $row["ID"];
				$logInAttemptsCount = $row["logInAttempt_count"] + 1;
				
				$db->query("UPDATE system_settings SET logInAttempt_count = $logInAttemptsCount WHERE ID = $recordID");
			}
			else // first time failed log in attempt frp, this IP
			{
				$db->query("INSERT INTO system_settings (logInAttempt_IP, logInAttempt_count) VALUES ('$ip_address', 1)");
			}
			//-----------------------------------LOG START-----------------------------------//
			
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (21, 'Failed log in attempt with Email ($email) & IP Address ($ip_address)')");
			
			//------------------------------------LOG END------------------------------------//
			return FALSE;
		}
	}

	public static function LogInAttemptsCount() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$ip_address = $_SERVER['REMOTE_ADDR'];
		
		$sql = "SELECT * FROM system_settings WHERE logInAttempt_IP = '$ip_address';";
		$result = $db->query($sql);
	
		if ($result != NULL && $result->num_rows >= 1)  // ip exists
		{
			$row = $result -> fetch_assoc();
			$logInAttemptsCount = $row["logInAttempt_count"];
			
			return $logInAttemptsCount;
		}
		else //first log in attempt
			return 0;
	}
	
	public static function WaitingTimeAfterLogInAttempts() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$ip_address = $_SERVER['REMOTE_ADDR'];
		
		$sql = "SELECT * FROM system_settings WHERE logInAttempt_IP = '$ip_address';";
		$result = $db->query($sql);
	
		if ($result != NULL && $result->num_rows >= 1)  // ip exists
		{
			$row = $result -> fetch_assoc();
			$logInAttemptsCount = $row["logInAttempt_count"];
			$lastStatusChange = strtotime($row["lastUpdated"]);
			$now = time();
			$timeSinceLastLogInAttempt = $lastStatusChange - $now;
			
			if($timeSinceLastLogInAttempt + (60 * 5) < 0)
			{
				$db->query("DELETE FROM system_settings WHERE logInAttempt_IP = '$ip_address';");
				return 0;
			}
			else if($logInAttemptsCount < 5)
				return 0;
			
			else if ($logInAttemptsCount == 5)
				return $timeSinceLastLogInAttempt + 60; //seconds
			
			else if ($logInAttemptsCount < 10)
				return 0;
			
			else if ($logInAttemptsCount >= 10)
				return $timeSinceLastLogInAttempt + (60 * 5); //seconds
		}
		else //first log in attempt
			return 0;
	}
	
	public static function isPasswordCorrect($email, $pass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$email = $db->escape_string($email);
		$pass = $db->escape_string($pass);
				
		$sql = "SELECT Password FROM user WHERE Email = '$email';";
		$result = $db->query($sql);
		
		$row = $result -> fetch_assoc();
		$db_pass = $row["Password"];
		
		if ($pass === $db_pass || password_verify($pass, $db_pass))  // password is correct
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

	public static function deleteUser($UserID, $AdminUserName) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		
		$UserName = user::getUserName($UserID);
		
		$sql = "DELETE FROM user WHERE UserID = $UserID;";
		
		$result = $db->query($sql);

		if ($result) //is true 
		{	
			//-----------------------------------LOG START-----------------------------------//
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (16, 'Admin ($AdminUserName) deleted user ($UserName)')");
			//------------------------------------LOG END------------------------------------//
			return TRUE;
		}	
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
	
	public static function isSystemAdmin($UserID)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT UserName FROM user WHERE UserID = $UserID;";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$UserName  = $row['UserName'];
			
			if($UserName === "System Admin") 
				return TRUE;
			else
				return FALSE;
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
	
	public static function isUserHaveTaskInThisRoom($UserID, $RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$sql = "SELECT * FROM task 
				WHERE RoomID = $RoomID
				AND UserID = $UserID";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // at least one task exists
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
		
		$IsUserWhoCreatedTaskSystemAdmin = user::isUserWhoCreatedTaskSystemAdmin($TaskID);
		$isUserSystemAdmin = user::isSystemAdmin($UserID);
		
		//User Who Created Task is not System Admin
		if(!$IsUserWhoCreatedTaskSystemAdmin)
		{
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
		else if ($IsUserWhoCreatedTaskSystemAdmin && !$isUserSystemAdmin) //User Who Created Task is System Admin and the current user isn't
			return FALSE;	//not autherized
	}

	public static function isUserWhoCreatedTaskSystemAdmin($TaskID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}
		$TaskID = $db->escape_string($TaskID);
		
		$sql = "SELECT UserID FROM task WHERE TaskID = $TaskID";
				
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
		{
			$row = $result->fetch_assoc();	
			
			if($row["UserID"] == 1) 
				return TRUE;
			else
				return FALSE;
		}
		else 
			return FALSE;
	}
	
	public static function modifyUserDetails ($UserID, $UserName, $Email, $CellPhone, $SendEmail, $SendSMS) 
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
		$CellPhone = $db->escape_string($CellPhone);
		$SendEmail = $db->escape_string($SendEmail);
		$SendSMS = $db->escape_string($SendSMS);

		$sql = "UPDATE user "
			. " SET Email = '$Email'," 
			. " CellPhone = $CellPhone," 
			. " SendEmail = $SendEmail," 
			. " SendSMS = $SendSMS" 
			. " WHERE UserID = $UserID;";

		if ($db->query($sql)) //TRUE
		{
			//-----------------------------------LOG START-----------------------------------//
			$AdminOrUser = "User"; if(user::isAdmin($UserID)) $AdminOrUser = "Admin"; 
			
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (28, '$AdminOrUser ($UserName) changed his/her personal settings')");
			//------------------------------------LOG END------------------------------------//
			
			return TRUE;
		}
		else 
			return FALSE;
	}
	
	public static function modifyUserDetails_AdminRights ($UserID, $UserName, $Email, $CellPhone, $Title, $isDisabled, $SendEmail, $SendSMS, $AdminUserName) 
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
		$CellPhone = $db->escape_string($CellPhone);
		$Title = $db->escape_string($Title);
		$isDisabled = $db->escape_string($isDisabled);
		$SendEmail = $db->escape_string($SendEmail);
		$SendSMS = $db->escape_string($SendSMS);

		$isDisabled_DB = user::isDisabled($UserID);
		
		$sql = "UPDATE user "
			. " SET UserName = '$UserName'," 
			. " Email = '$Email'," 
			. " CellPhone = '$CellPhone'," 
			. " Title = '$Title'," 
			. " isDisabled = $isDisabled," 
			. " SendEmail = $SendEmail," 
			. " SendSMS = $SendSMS" 
			. " WHERE UserID = $UserID;";

		if ($db->query($sql)) //TRUE
		{
			//-----------------------------------LOG START-----------------------------------//
			if(!$isDisabled_DB && $isDisabled)	//Admin Disabled User Account
				
				$db->query("INSERT INTO log (RecordCategoryID, Description)
				VALUES (17, 'Admin ($AdminUserName) disabled the account of user ($UserName)')");
				
			else if($isDisabled_DB && !$isDisabled)	//Admin Enabled User Account
	
				$db->query("INSERT INTO log (RecordCategoryID, Description)
				VALUES (18, 'Admin ($AdminUserName) Enabled the account of user ($UserName)')");
			//------------------------------------LOG END------------------------------------//

			return TRUE;
		}
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
		{
			//-----------------------------------LOG START-----------------------------------//
			$AdminOrUser = "User"; if(user::isAdmin($UserID)) $AdminOrUser = "Admin"; 
			$UserName = user::getUserName($UserID);
			
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (28, '$AdminOrUser ($UserName) changed his/her personal Image')");
			//------------------------------------LOG END------------------------------------//
			
			return TRUE;
		}
		else 
			return FALSE;
	}
	
	public static function AuthoriseRoom($UserID, $RoomID, $AdminUserName)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$UserName = user::getUserName($UserID);
		
		//-----------------------Get Room Name---------------------------------//
		$result = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
		$row = $result -> fetch_assoc();
		
		$RoomName = $row["RoomName"];
		//---------------------------------------------------------------------//
		
		$sql = "INSERT INTO user_authorized_rooms (UserID, RoomID)
		VALUES ($UserID, $RoomID);";
		
		$db->query($sql);

		if ($db->affected_rows == 1)
		{
			//-----------------------------------LOG START-----------------------------------//
				
				$db->query("INSERT INTO log (RecordCategoryID, Description)
				VALUES (19, 'Admin ($AdminUserName) authorized ($RoomName) to user ($UserName)')");
			
			//------------------------------------LOG END------------------------------------//
			
			return TRUE;
		}	
		else 
			return FALSE;
	}

	public static function unAuthoriseRoom($UserID, $RoomID, $AdminUserName)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$UserID = $db->escape_string($UserID);
		$RoomID = $db->escape_string($RoomID);
		
		$UserName = user::getUserName($UserID);
		
		//-----------------------Get Room Name---------------------------------//
		$result = $db->query("SELECT RoomName FROM room WHERE RoomID = $RoomID");
		$row = $result -> fetch_assoc();
		
		$RoomName = $row["RoomName"];
		//---------------------------------------------------------------------//
		
		$sql = "DELETE FROM user_authorized_rooms WHERE 
		UserID = $UserID AND
		RoomID = $RoomID;";
		
		$result = $db->query($sql);

		if ($result) //is true 
		{
			//-----------------------------------LOG START-----------------------------------//
				
				$db->query("INSERT INTO log (RecordCategoryID, Description)
				VALUES (20, 'Admin ($AdminUserName) unauthorized ($RoomName) from user ($UserName)')");
			
			//------------------------------------LOG END------------------------------------//
			
			return TRUE;
		}
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
	
	public static function UpdatePassword($Email, $OldPass, $NewPass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$Email = $db->escape_string($Email);
		$OldPass = $db->escape_string($OldPass);
		$NewPass = $db->escape_string($NewPass);
		$UserID = user::getIdByEmail($Email);
		
		$isPassCorrect = user::isPasswordCorrect($Email, $OldPass);
		
		if($isPassCorrect)	//Old Password is Correct
		{
			$NewPass = password_hash($NewPass, PASSWORD_DEFAULT);
			
			$sql = "UPDATE user SET Password = '$NewPass' WHERE UserID = $UserID;";	
		
			if ($db->query($sql)) //TRUE
			{
				//-----------------------------------LOG START-----------------------------------//
				$AdminOrUser = "User"; if(user::isAdmin($UserID)) $AdminOrUser = "Admin"; 
				$UserName = user::getUserName($UserID);
				
				$db->query("INSERT INTO log (RecordCategoryID, Description) "
						. " VALUES (28, '$AdminOrUser ($UserName) changed his/her PASSWORD')");
				//------------------------------------LOG END------------------------------------//
				
				return TRUE;
			}
			else 
				return FALSE;
		}
		else					//Old Password is NOT Correct
			return FALSE;
	}
	
	public static function UpdatePassword_AdminRights($UserID, $NewPass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);
		$NewPass = $db->escape_string($NewPass);

		$NewPass = password_hash($NewPass, PASSWORD_DEFAULT);
		
		$sql = "UPDATE user SET Password = '$NewPass' WHERE UserID = $UserID;";	
	
		if ($db->query($sql)) //TRUE
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function getUserImagePath($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$UserID = $db->escape_string($UserID);
		
		$sql = "SELECT UserImagePath FROM user WHERE UserID = $UserID";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			return $row["UserImagePath"];
		}
		else 
			return NULL;
	}
	
	public static function isUserExists($UserID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}
		$UserID = $db->escape_string($UserID);

		if(!is_numeric($UserID)) return FALSE;
		
		$result = $db->query("SELECT UserName FROM user WHERE UserID = '$UserID';");
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return TRUE;
		else 
			return FALSE;
	}



}
