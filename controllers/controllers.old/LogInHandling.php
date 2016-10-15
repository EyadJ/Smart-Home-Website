<?php
		include_once("../controllers/EstablishSession.php");
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
			setcookie("Email", $_POST["Email"], time()+60*60*24*7, "/");
			setcookie("Pass", $_POST["Pass"], time()+60*60*24*7, "/");
			}
			else 
			{
				/* Cookie expires when browser closes */
				setcookie("Email", "", time() - 3600, "/");
				setcookie("Pass", "", time() - 3600, "/");
			}
			
			$FullName = user::getFullName($email);
			$isAdmin = user::isAdmin($email);
			$uId = user::getUserIdByEmail($email);

			//var_dump($FullName);
			//var_dump($email);
			//var_dump($isAdmin);
			
			$_SESSION["uId"] = $uId;  
			$_SESSION["FullName"] = $FullName;  
			$_SESSION["Email"] = $email;        
			$_SESSION["Admin"] = $isAdmin;   

			EstablishSession::storeSupplierInSession();
			EstablishSession::storeCategoryInSession();
			EstablishSession::storePrdctsImgsPathInSession();
			
			header("Location:../views/HomePage.php");
		}
		else
		{
			header("Location:../views/LogIn.php?InCorrectPassword=TRUE");
		}
	}
	
?>		