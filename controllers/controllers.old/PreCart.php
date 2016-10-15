<?php
	include_once("../models/Cart.php");
	include_once("../models/Product.php");

			$uId = $_SESSION['uId'];
		
			$result = Cart::retriveProductsFromCart($uId);
			$grandTotalCost = Cart::retriveGrandTotalCost($uId);

			if($result!= NULL)
			{
				echo 
					"<thead><tr>
					<th width='7%' >#</th>
					<th width='20%' >Img</th>
					<th width='30%' >Name</th>
					<th width='10%' >Cost</th>
					<th width='10%' >Quantity</th>
					<th width='10%' >Total</th>
					<th width='10%' >Delete</th>
					</tr></thead>";
				
				$i = 1;
				while ($row = $result->fetch_assoc()) 
				{
					$pId = $row['pId'];
					$pDetails = Product::retriveProductDetails($pId);
							
					$name = $pDetails['Name'];
					$pImgPath = $pDetails['PImgPath'];

					echo 
					"<tr align='center'>
					
					<td> ". $i ."</td>
					
					<td><a href='productDetails.php?var=". $pId ."'>
					<img src='" . $_SESSION['PrdctsImgsPath'] . $pImgPath .
					"' width='150px' height='100px'/></a></td>
					
					<td style='font-size:18px;'><b>" . $name . "</b></td>
										
					<td>" . $row["cost"] . " SR</td>
					
					<td><input type='hidden' name='pId" . $i . "' value='" . $pId . "' />
					<input type='number' name='qty". $i ."' style='width:40px;' value='" . $row["Quantity"] . "' /></td>

					 <td>". ($row["cost"] * $row["Quantity"]) ." SR</td>
					 
					 <td>
					<a href='../controllers/DeleteProductFromCartHandling.php?delete=$row[pId]'>
					<img src='../controllers/images/Delete_Icon.png' width='40' height='40'/></a></td>
					</tr>";
				$i++;
				}
				
				echo '<tr style="font-size:20px;"><td></td> <td colspan="3"></td>
				
				<td><input type="submit" value="Save" /></td>
				
				<td><b>'. $grandTotalCost .' SR</b></td><td></td></tr><tr>
				
				<th colspan="8" height="30px"><a href="createOrder.php"><button type="button">Proceed to Order</button></a></th></tr>';
			}
			else
			{
				echo "<tr><th><h2><b>You don't have Products in your Cart !</b></h2></th></tr>";
			}

?>
