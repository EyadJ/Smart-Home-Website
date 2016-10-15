<?php
	session_start();
	include_once("../models/Supplier.php");
	include_once("../models/Category.php");
	include_once("../models/Product.php");

	if(isset($_GET["supplier"]))
	{
		$searchResults;
		$suppliersArray = $_GET['supplier'];
		$length = count($suppliersArray);
		$stringValueOfAllCheckBoxes="";
		$CatName = $_GET['category'];
		$keyWord = $_GET['keyWord'];
		$CatId = Category::getCategoryIdByName($CatName);
		//var_dump($CatName);
		//var_dump($CatId);

		if($length > 1)
		{
			
			$i = 0;
			foreach($suppliersArray as $x) 
			{
				
				$Sid = Supplier::getSupplierIdByName($x);
				//var_dump($Sid);
				
				if($i<$length-1)
				$stringValueOfAllCheckBoxes .= $Sid . ",";

				if($i==$length-1)
				{
					$stringValueOfAllCheckBoxes .= $Sid ;
					break;
				}

				$i++;
			}
			
				$searchResults = Product::searchProducts($CatId, $stringValueOfAllCheckBoxes, $keyWord);
		}
		else if($length == 1) 
		{ //echo "else";
			
			foreach($suppliersArray as $x) 
			{
				$Sid = Supplier::getSupplierIdByName($x);
			}

			$searchResults = Product::searchProductsByOneSupplier($CatId, $Sid, $keyWord);
		}	
			//var_dump($searchResults);

		$_SESSION['results'] = NULL;
		$i = 0;
		while($row = mysqli_fetch_array($searchResults))
		{
			$_SESSION['results'][$i] = $row;
			$i++;
		}

		if ($i == 0)
		{
			$_SESSION["results"] = FALSE;
		}
		//var_dump($_SESSION['results']);
		//var_dump($stringValueOfAllCheckBoxes);

		header("Location:../views/Search.php?viewLastSearch=true");
	}
?>
