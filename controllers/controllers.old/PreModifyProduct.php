 <?php
	include_once("../models/Product.php");
	
if(isset($_GET["var"]))
{
	$row = Product::retriveProductDetails($_GET["var"]);	

	if(isset($row))
	{
		//echo $_GET["var"];
				
		echo '
		<form name="formR" method="post" action="../controllers/ModifyProductHandling.php?var='.$_GET['var'].'" enctype="multipart/form-data">
		<table align="center" style="width:800px">
		
		<tr><td>Serial number</td><td align="left"><input type="text" name="Pid" value="'.$row['Pid'].'" required/></td> 

		<td rowspan="4" align="center">
		<img src= "'.$_SESSION['PrdctsImgsPath'].$row["PImgPath"].'" width="400px" height="180px" id="printed_image"/></td></tr>
		
		<tr><td>Name</td><td align="left"><input type="text" name="Name" value="'.$row['Name'].'" maxlength="25" required/></td></tr>
		
		<tr><td>Cost</td><td align="left"><input type="number" name="Cost" value="'.$row['Cost'].'" required/></td></tr>    
		
		<tr><td>Supplier</td><td align="left">
		<input type="text" readonly="readonly" name="Sname" value="'.$_SESSION['supplierName'][$row["Sid"]].'" maxlength="25" required/></td></tr>

		
		<tr><td>Category</td>
		<td align="left">
		<select Name="CatId">';
		
		$categories = $_SESSION['category'];

		for($j = 0; $j < count($categories); $j++)
		{
			if($categories[$j]['CatId'] == $row['CatId'])
			{
				echo "<option value='".$categories[$j]['CatId']."' selected='selected'>".$categories[$j]['Name']."</option>";
			}
			else
			{
				echo "<option value='".$categories[$j]['CatId']."'>".$categories[$j]['Name']."</option>";
			}
		}
		
		echo '</select>
		</td>
		
		<td rowspan="3"><textarea placeholder="Description" rows="5" cols="48" style="resize:none;"
		name="Description" id = "desc">'.$row["Description"].'</textarea></td></tr>
		
		<tr><td>Img</td><td  align="left">
		<input type="file" value="'.$row["PImgPath"].'" name="fileToUpload" id="fileToUpload"/>
		</td></tr>
		
		<tr><td align="left" colspan="2">
		&nbsp;<input type="submit" value="Save" />&nbsp;<input type="reset" value="Reset"/>
		<div style="float:right; "><a href="ProductManagment.php?var='.$_SESSION['lastSelectedSupplierId'].'"><button type = "button" align="Right">Cancel</button></a></div>
		';
	}
}
?>	