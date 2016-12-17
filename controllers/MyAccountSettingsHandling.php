<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }

	include_once("../models/user.php");
	
if(isset($_POST["Save"]))
{
	$SendEmail = 0; $SendSMS = 0;
	
	if(isset($_POST['SendEmail']) && $_POST['SendEmail'] == "on") $SendEmail = 1;
	
	if(isset($_POST['SendSMS']) && $_POST['SendSMS'] == "on") $SendSMS = 1;
	
	$UserID = $_SESSION["UserID"];
	$UserName = $_SESSION["UserName"];
	
	$target_dir = "../controllers/images/Users/";
	$basename = basename($_FILES["fileToUpload"]["name"]);

	$target_file = ($target_dir . $basename);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2500000) 
	{
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" 
	&& $imageFileType != "JPEG" && $imageFileType != "GIF" )
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
		echo "Sorry, your file was not uploaded.";
	}
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$uploadedSuccessfully = user::modifyUserImagePath($UserID, $basename);
			
			if($uploadedSuccessfully)
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		}
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}
	$modifiedSuccessfully = user::modifyUserDetails($UserID, $UserName, $_POST["Email"], $_POST["CellPhone"], $SendEmail, $SendSMS);
			   
			echo $modifiedSuccessfully;
	 
			header("Location: ../views/" . $_GET["referrer"] . "");
}
	
?>







