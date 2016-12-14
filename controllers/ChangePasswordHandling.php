<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }

	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];
	
	if(isset($_POST["UpdatePass"]))
	{
		$OldPass = $_POST["OldPass"];
		$NewPass = $_POST["NewPass"];
		$NewPassConf = $_POST["NewPassConf"];
		
		if($NewPass === $NewPassConf)
		{
			$isSuccessfull = user::UpdatePassword($UserID, $OldPass, $NewPass);
			
			if($isSuccessfull)
				header("Location:../views/myAccount.php?message=ChangedPassSuccessfully");
		}
		else	
			header("Location:../views/myAccount.php?message=ProblemUpdatingPass");
	}
	else	
		header("Location:../views/myAccount.php");
?>