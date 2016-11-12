<?php

	include_once("../models/user.php");
	session_start();

	$UserID = $_GET["var"];
	$isAdmin = $_SESSION["isAdmin"];
	
	if(isset($_POST["UpdatePass"]) && $isAdmin)
	{
		echo "co";
		$NewPass = $_POST["NewPass"];
		$NewPassConf = $_POST["NewPassConf"];
		
		if($NewPass === $NewPassConf)
		{
			$isSuccessfull = user::UpdatePassword_AdminRights($UserID, $NewPass);
			
			if($isSuccessfull)
				header("Location:../views/modifyUserSettings.php?var=$UserID&message=ChangedPassSuccessfully");
		}
		else	
			header("Location:../views/modifyUserSettings.php?var=$UserID&message=ProblemUpdatingPass");
	}
	else	
		//header("Location:../views/modifyUserSettings.php?var=$UserID");
?>