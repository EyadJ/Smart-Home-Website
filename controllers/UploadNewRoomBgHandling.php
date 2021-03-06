<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }
   
	include_once("../models/room.php");
	
	$RoomID = $_GET["var"];
	$target_dir = "../controllers/images/rooms/";
	$basename = basename($_FILES["fileToUpload"]["name"]);

	$UserName = $_SESSION["UserName"];
	$isAdmin = $_SESSION["isAdmin"];
	
	$uploadOk = 1;
	$imageFileType = pathinfo($basename, PATHINFO_EXTENSION);
	
	$basename = room::getRoomName($RoomID) . "_" . date('Y-m-d-H-i-s') . "." . $imageFileType . "";
	
	$target_file = $target_dir . $basename;
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" 
	&& $imageFileType != "JPEG"&& $imageFileType != "GIF" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	}
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$insertedSuccessfully = room::modifyRoomImagePath($RoomID, $basename);
			//echo $insertedSuccessfully;
			$insertedSuccessfully = room::addNewImageToRoomBGs($RoomID, $basename, $UserName, $isAdmin);
			//echo $insertedSuccessfully;
			
			header("Location: ../views/RoomSettings.php?RoomID=$RoomID");
		}
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
    }

?>