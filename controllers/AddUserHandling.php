<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || !$_SESSION["isAdmin"]){  header("Location: HomePage.php"); } 


	include_once("../models/user.php");
	
	$AdminUserName = $_SESSION["UserName"];
	
	$NewlyCreatedUserID = user::addNewUser($_POST['userName'], $_POST['Title'],
			$_POST['email'], $_POST['CellPhone'], $_POST['Pass'], $AdminUserName);
			
	if($NewlyCreatedUserID != NULL && isset($_FILES["fileToUpload"]["name"]))
	{
		$target_dir = "../controllers/images/users/";
		$basename = basename($_FILES["fileToUpload"]["name"]);

		$target_file = $target_dir . $basename;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

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
		if ($_FILES["fileToUpload"]["size"] > 1500000) {
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
				$UserImagePath = $basename;
				$UserID = $NewlyCreatedUserID;
				
				user::modifyUserImagePath($UserID, $UserImagePath);
				
				header("Location: ../views/Users.php");
			}
			else 
			{
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
		//in case something went wrong
		header("Location: ../views/Users.php");
?>