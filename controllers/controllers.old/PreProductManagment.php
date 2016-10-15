<?php
	include_once("../models/Product.php");

	if(isset($_GET["var"]))
	{
	
		// to check if the get var is not tampered with and it is authentic supplier id
		if(isset($_SESSION['supplierName'][$_GET["var"]])) 
		{
			$_SESSION['lastSelectedSupplierId'] = $_GET["var"];
		
			$result = Product::retriveProductDetailsBySupplierId($_GET["var"]);

			if($result!= NULL)
			{
				echo 
					"<thead><tr>
					<th width='20%' >Img</th>
					<th width='30%' >Name</th>
					<th width='10%' >Modify</th>
					<th width='10%' >Delete</th>
					</tr></thead>";
				
				while ($row = $result->fetch_assoc()) 
				{
					echo 
					"<tr align='center'>
					<td><img src='" . $_SESSION['PrdctsImgsPath'] . $row["PImgPath"] .
					"' width='150px' height='100px'/></td>
					<td style='font-size:18px;'><b>" . $row["Name"] . "</b></td>
					<td><a href='ModifyProduct.php?var=".$row["Pid"]."'>
					<img src='../controllers/images/Modify.jpg' width='40' height='40'/>
					</a></td>
					<td><a href='../controllers/deleteProduct.php?Pid=".$row["Pid"]."'>
					<img src='../controllers/images/Delete_Icon.png' width='40' height='40'/>
					</a></td></tr>";
				}
			}
			else
			{
				echo "<tr><th><h2><b>No Products Were Found!</b></h2></th></tr>";
			}
		}
	}
?>
