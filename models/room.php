<?php


/**
 *
 */
require_once("config.php");

	//include_once("abc.php");

class Room
{
	
	public static function getAllRoomsDetails() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('unable to connect to database [' . $db->connect_error .']');
		}

		$sql = "SELECT * FROM room";
		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  
			return $result;
		else 
			return NULL;
	}
	
	public static function getRoomName($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$RoomID = $db->escape_string($RoomID);
		$sql = "SELECT RoomName FROM room WHERE roomID = $RoomID;";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$RoomName = $row["RoomName"];
			return $RoomName;
		}
		else 
			return "couldn't find room";
	}


public static function getAllRoomBackgrounds($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$RoomID = $db->escape_string($RoomID);
		$sql = "SELECT ImgPath FROM room_backgrounds WHERE roomID = $RoomID;";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
			return $result;
		else 
			return "couldn't find room";
	}

public static function getRoomSelectedBackground($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$RoomID = $db->escape_string($RoomID);
		$sql = "SELECT RoomImgPath FROM room WHERE roomID = $RoomID;";

		$result = $db->query($sql);
	 
		if ($result != NULL && $result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$RoomImgPath = $row['RoomImgPath'];
			return $RoomImgPath;
		}
		else 
			return "couldn't find room";
	}
	
	public static function modifyRoomImagePath ($RoomID, $RoomImgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$RoomID = $db->escape_string($RoomID);
		$RoomImgPath = $db->escape_string($RoomImgPath);
		
		$sql = "UPDATE room SET"
			. " RoomImgPath = '$RoomImgPath'" 
			. " WHERE RoomID = $RoomID;";

		if ($db->query($sql)) //TRUE
			return TRUE;
		else 
			return FALSE;
	}
	
	public static function addNewImageToRoomBGs ($RoomID, $RoomImgPath, $UserName, $isAdmin) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$RoomID = $db->escape_string($RoomID);
		$RoomImgPath = $db->escape_string($RoomImgPath);
		
		$RoomName = room::getRoomName($RoomID);
		
		$sql = "INSERT INTO room_backgrounds "
		  . "(RoomID, ImgPath) "
		  . " VALUES ($RoomID, '$RoomImgPath')";
		
		if ($db->query($sql)) //TRUE
		{
			$AdminOrUser = "User"; if($isAdmin) $AdminOrUser = "Admin"; 
			
			//-----------------------------------LOG START-----------------------------------//
			$db->query("INSERT INTO log (RecordCategoryID, Description) "
					. " VALUES (29, '$AdminOrUser ($UserName) uploaded a new background for room ($RoomName)')");
			//------------------------------------LOG END------------------------------------//
			
			return TRUE;
		}
		else 
			return FALSE;
	}
	
	public static function IsBackgroundDefault($RoomID, $ImgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$RoomID = $db->escape_string($RoomID);
		$ImgPath = $db->escape_string($ImgPath);
		
		$sql = "SELECT isDefault FROM room_backgrounds"
		. " WHERE roomID = $RoomID AND ImgPath = '$ImgPath';";

		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		$isDefault = $row['isDefault'];
		
		if ($isDefault == 1)  // id number exists
			return TRUE;
		else if ($isDefault == 0)
			return FALSE;
	}
	
	public static function deleteRoomBackground($RoomID, $ImgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$RoomID = $db->escape_string($RoomID);
		$ImgPath = $db->escape_string($ImgPath);
		
		$sql = "DELETE FROM room_backgrounds WHERE roomID = $RoomID AND ImgPath = '$ImgPath';";

		$result = $db->query($sql);

		if ($result)
		{
			unlink(('../controllers/images/rooms/' . $ImgPath));
			return TRUE;
		}
		else 
			return  FALSE;
	}
	
	public static function isRoomExists($RoomID) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}
		$RoomID = $db->escape_string($RoomID);
		
		if(!is_numeric($RoomID)) return FALSE;
		
		$result = $db->query("SELECT RoomName FROM room WHERE roomID = $RoomID;");
	 
		if ($result != NULL && $result->num_rows >= 1) 
			return TRUE;
		else 
			return FALSE;
	}







}
