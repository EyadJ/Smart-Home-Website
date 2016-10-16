<?php
		include_once("../models/user.php");

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
			/* Set cookie to last 1 year */
			setcookie("Email", $_POST["Email"], time()+60*60*24*365, "/");
			setcookie("Pass", $_POST["Pass"], time()+60*60*24*365, "/");
			} 
			else 
			{
				/* Cookie expires when browser closes */
				setcookie("Email", "", time() - 3600, "/");
				setcookie("Pass", "", time() - 3600, "/");
			}
			
			$UserName = user::getUserName($email);
			$isAdmin = user::isAdmin($email);
			$UserID = user::getIdByEmail($email);
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