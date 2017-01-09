<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }

	include_once("../models/user.php");

	$Email = $_SESSION["Email"];
	$referrer = $_GET["referrer"];
	
	if(isset($_POST["NewPass"]))
	{
		$OldPass = $_POST["OldPass"];
		$NewPass = $_POST["NewPass"];
		$NewPassConf = $_POST["NewPassConf"];
		
		if($NewPass === $NewPassConf)
		{
			$isSuccessfull = user::UpdatePassword($Email, $OldPass, $NewPass);
			
			if($isSuccessfull)
				header("Location:../views/myAccount.php?referrer=" . $referrer . "&message=ChangedPassSuccessfully");
			else
				header("Location:../views/myAccount.php?referrer=" . $referrer . "&message=ProblemUpdatingPass");
		}
		else	
			header("Location:../views/myAccount.php?referrer=" . $referrer . "&message=InCorrectPassConfirmation");
	}
	else
		header("Location:../views/myAccount.php?referrer=" . $referrer . "&message=unautherizedAccess");
	
?>