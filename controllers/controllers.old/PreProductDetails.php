<?php    
	require_once("../models/Product.php");

	if(isset($_GET["var"]))
	{	
		$row = Product::retriveProductDetails($_GET["var"]);

		if($row != NULL)
		{
			//die("died");

			echo'
			<tr><th colspan="3" style="padding:6px 0 6px 0%; "<a name = "productDetails">Product Details:</a></th>
			
			</tr>

			<tr><td>  Name: </td>
			<td>'.$row["Name"].'</td>
			
			<td rowspan = "7">
			<img src = '.$_SESSION['PrdctsImgsPath'].$row['PImgPath'].' width="350px"/>
			</td>
			
			</tr>
				 
			  <tr><td>  Serial Number: </td>
			<td>'.$row["Pid"].'</td></tr>
						 
			<tr><td>  Brand: </td>
				<td>Medtronic</td> </tr>
				   
				<tr><td> Price: </td>
			<td> SR '.$row["Cost"].'</td> </tr>
						 
			 <tr><td>  Warranty: </td>
			<td> '.$row["Warranty"].' Years</td> </tr>
						 
			 <tr><td>Description: </td>
			<td>'.$row["Description"].'</td> </tr>
				   
			<tr><td>  Features: </td>
				<td>'.$row["Features"].'</td> </tr>                   
						 
				<tr><th colspan="3" style=" padding:6px 0 6px 0%; ">
				
				<a href="../controllers/addPoductToCartHandling.php?var='. $_GET['var'] . '">
				<button type="button">Add to Cart</button>	
				</a>';
			
			if(isset($_GET["addedSuccessfuly"]))
			{
				 echo "<span style='color:red;'>&nbsp;&nbsp;Added Successfuly..</span>";
			}
			echo "</th></tr>";
		}
	}
?>