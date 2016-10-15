<?php
	include_once("../models/Supplier.php");
	include_once("../models/Category.php");
	
Class EstablishSession
{
	public static function storePrdctsImgsPathInSession()
	{
		$_SESSION['PrdctsImgsPath'] = "../controllers/Images/Products/";
	}
	
	public static function storeSupplierInSession()
	{
		$result = Supplier::getSupplierIdAndNameForAll();
		
		$i = 0;
		while($row = mysqli_fetch_array($result))
		{
			$_SESSION['supplier'][$i] = $row;
			$_SESSION['supplierName'][$row["Sid"]] = $row["Name"];
			$_SESSION['supplierId'][$row["Name"]] = $row["Sid"];

			$i++;
		}
	}
	
	public static function storeCategoryInSession()
	{
		$result = Category::getCategoryIdAndNameForAll();
		
		$i = 0;
		while($row = mysqli_fetch_array($result))
		{
			$_SESSION['category'][$i] = $row;
			$_SESSION['categoryName'][$row["CatId"]] = $row["Name"];
			$_SESSION['categoryId'][$row["Name"]] = $row["CatId"];
			
			$i++;
		}
	}
}
?>
