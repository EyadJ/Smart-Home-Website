<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); } 

	include_once("../models/user.php");
	session_start();
	
if(isset($_POST["Save"]))
{
	$userID = $_GET["var"];
	$target_dir = "../controllers/images/Users/";
	$basename = basename($_FILES["fileToUpload"]["name"]);

	$target_file = ($target_dir . $basename);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) 
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
			$uploadedSuccessfully = user::modifyUserImagePath($userID, $basename);
			
			echo $uploadedSuccessfully;
			if($uploadedSuccessfully)
			{
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			}
		}
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}
	$modifiedSuccessfully = User::modifyUserDetails
			(
			$userID,
			$_POST['UserName'],
			$_POST['Email'],
			$_POST['Description'],
			$_POST['Password']
			);
			   
			//echo $modifiedSuccessfully;
	 
			header("Location: ../views/Users.php");
}
	
?>







