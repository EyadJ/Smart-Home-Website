<?php
   
	include_once("../models/task.php");
	
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			$insertedSuccessfully = user::addNewUser($_POST['userName'], $_POST['Description'],
			$_POST['email'], $_POST['Pass'], $isAdmin, $basename);
		
			header("Location: ../views/ControlPanal.php");
		}
		else 
		{
			//echo "Sorry.. Problem Occured";
		}
    }

?>