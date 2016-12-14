<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || !$_SESSION["isAdmin"]){  header("Location: HomePage.php"); } 

	include_once("../models/user.php");
	
	$AdminUserName = $_SESSION["UserName"];
	
if(isset($_POST["Save"]))
{
	$isDisabled = 0;
	if(isset($_POST['isDisabled']) && $_POST['isDisabled'] == "on")
		$isDisabled = 1;

	$SendEmail = 0; $SendSMS = 0;
	
	if(isset($_POST['SendEmail']) && $_POST['SendEmail'] == "on") $SendEmail = 1;
	
	if(isset($_POST['SendSMS']) && $_POST['SendSMS'] == "on") $SendSMS = 1;
	
	
	$UserID = $_GET["var"];
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
			$uploadedSuccessfully = user::modifyUserImagePath($UserID, $basename);
			
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

	$modifiedSuccessfully = user::modifyUserDetails_AdminRights
			(
			$UserID,
			$_POST['UserName'],
			$_POST['Email'],
			$_POST['CellPhone'],
			$_POST['Title'],
			$isDisabled,
			$SendEmail,
			$SendSMS,
			$AdminUserName
			);
	 
			header("Location: ../views/Users.php");
}
	
?>







