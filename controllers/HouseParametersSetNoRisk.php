<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"])){ header("Location: LogIn.php"); }

include_once("../models/critical.php");

	critical::houseParametersSetNoRisk();
	
	header("Location:../views/" . $_GET["referrer"] . "");
?>