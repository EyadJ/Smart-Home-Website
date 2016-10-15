<?php
   if(isset($_SESSION["results"]))
   {
		$result = $_SESSION["results"];
		/*$tempSupplierArray = $_SESSION['supplier'];	$i = 0;		foreach ($result as $row) 	
		{	for($j = 0; $j < count($_SESSION['supplier']); $j++)	{	
		if($tempSupplierArray[$j]['Sid'] == $row['Sid']){$suppliers[$i] = $tempSupplierArray[$j]['Name'];	}}	$i++;}*/
		
		$string = "";
		$i = 0;
		if ($result != FALSE && isset($_GET["viewLastSearch"]) && $_GET["viewLastSearch"] == "true")   //($result->num_rows >= 1) 
		{
		//var_dump($result);
			foreach ($result as $row) 
			{
				$string .= "<tr> 
				<th><u>Product</u>: ".$row['Name']."<br><u>Brand</u>: ".$_SESSION['supplierName'][$row['Sid']]."<br><u>Price</u>: ".$row['Cost']."</th>
				<th><img src = ".$_SESSION['PrdctsImgsPath'].$row['PImgPath']." width='100px'/></th>
				<th><a href='productDetails.php?var=".$row['Pid']."'><button type='button'> View Details </button></a></th>
				</tr>";
				$i++;
			}
			//$_SESSION["results"] = NULL;//////4HOURS///////////////////////////////////////////////////////////
			echo $string;	
		}
		else if (!isset($_GET["viewLastSearch"]))
		{
			echo "<tr><th><h2 style='font-weight: lighter;'>View Your Last Search Results ?
			<u><a href=Search.php?viewLastSearch=true>Click Here</a></u></h2></th></tr>";
		}
		else  //($result == FALSE)
		{
			echo "<tr><th><h2><b>No Results Were Found!</b></h2></th></tr>";
			$_SESSION["results"] = NULL;
		}
	}
	else {	}	
?>
