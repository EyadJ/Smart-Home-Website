<?php

	include_once("../models/Supplier.php");
	include_once("../models/Category.php");
//
//
Class PreSearch
{
	public static function retriveSupplierNames()
	{
		$result = Supplier::getSupplierNameForAll();
		
		$string = "";
		while($row = $result->fetch_assoc()) 
		{
			$string .= "<label> 
			<input type='checkbox' name = 'supplier[]' value = '$row[Name]' id = '$row[Name]'/>
			$row[Name]</label>";
		}
		return $string;
	}
//
//
	public static function retriveCategoryNames()
	{
		$result = Category::getCategoryNameForAll();

		$string = "";
		while($row = $result->fetch_assoc()) 
		{
			$string .= "<option value = '$row[Name]'>$row[Name]</option>";
		}
		return $string;
	}
}
?>
