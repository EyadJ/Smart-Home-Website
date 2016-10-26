<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"])){  header("Location: HomePage.php"); }


	include_once("../models/task.php");

	$TaskID = $_GET['var'];
	$RoomID = $_GET['var2'];
	if(isset($_POST))
	{
		$deletedSuccessfully = task::deleteTask($TaskID);
		
		header("Location: ../views/RoomSettings.php?var=$RoomID");
	}
?>
