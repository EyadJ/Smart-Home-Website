<?php /*error_reporting(0);*/ session_start(); if (!isset($_SESSION["Email"])) header("Location: Homepage.php");?>

<?php
	include_once("../models/Cart.php");
	
	$uId = $_SESSION["uId"];
	
	$i = 1;
	
	if(isset($uId))
	{
		while(true)
		{
			if(isset($_GET["pId".strval($i)]) && isset($_GET["qty".strval($i)]))
			{
				$pId = $_GET["pId" . strval($i)];
				$qty = $_GET["qty" . strval($i)];
			
				Cart::changeQty($uId, $pId, $qty);
			}
			else
			{
				break;
			}
			$i++;
		}
	}
	
	header("Location: ../views/Cart.php");
?>
