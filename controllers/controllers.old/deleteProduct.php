<?php 
	include_once("../models/Product.php");
	session_start();
	
	Product::deleteProduct($_GET['Pid']);
	
	header("Location: ../views/ProductManagment.php?var=$_SESSION[lastSelectedSupplierId]");
?>