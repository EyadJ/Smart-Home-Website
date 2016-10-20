<?php
		include_once("../models/User.php");

	if(isset($_POST['Pass']) && isset($_POST['Email']))
	{
		
		$email = $_POST['Email'];
		$pass = $_POST['Pass'];
		
		$successfullLogin = user::logInAttempt($email, $pass);
		
		if($successfullLogin)
		{
			session_start();  ////////2HOURS////////////////

			if (isset($_POST['rememberme'])) 
			{
			/* Set cookie to last 1 day */
			setcookie("Email", $_POST["Email"], time()+60*60*24, "/");
			setcookie("Pass", $_POST["Pass"], time()+60*60*24, "/");
			} 
			else 
			{
				/* Cookie expires when browser closes */
				setcookie("Email", "", time() - 3600, "/");
				setcookie("Pass", "", time() - 3600, "/");
			}
			
			$UserID = user::getIdByEmail($email);
			$isAdmin = user::isAdmin($UserID);
			$UserName = user::getUserName($UserID);
			//var_dump($UserName);
			//var_dump($email);
			//var_dump($isAdmin);
			
			$_SESSION["UserName"] = $UserName;
			$_SESSION["UserID"] = $UserID;
			$_SESSION["Email"] = $email;
			$_SESSION["Admin"] = $isAdmin;

			header("Location:../views/Rooms.php");
		}
		else
		{
			header("Location:../views/LogIn.php?InCorrectPassword=TRUE");
		}
	}
	
?>		