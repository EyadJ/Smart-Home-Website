<?php /*error_reporting(0);*/ session_start(); if (!isset($_SESSION["Email"])) header("Location: Homepage.php");?>

<?php
	include_once("../models/Cart.php");
	
	$uId = $_SESSION["uId"];
	$pId = $_GET["delete"];
	
	if(isset($uId) && isset($pId) )
	{
		Cart::deleteProductFromCart($uId, $pId);
	}
	
	header("Location: ../views/Cart.php");
?>
