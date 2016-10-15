 <?php
	$categories = $_SESSION['category'];
		//var_dump($categories);
		
		echo '<tr><td>Supplier</td>'.
		'<td align="left"><input type="textbox" value="'.$_SESSION['supplierName'][$_SESSION['lastSelectedSupplierId']].
		'" name="Sname" readonly="readonly"/></td></tr>' .
		'<tr><td>Category</td><td align="left">'.
		'<select Name="CatId">';
		
		for($j = 0; $j < count($categories); $j++)
		{
			echo "<option value='".$categories[$j]['CatId']."' >".$categories[$j]['Name']."</option>";
		}

		echo "</select>";
?>	