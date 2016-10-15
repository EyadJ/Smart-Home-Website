<?php
	include_once("../models/Supplier.php");

	$result = Supplier::getSuppliersDetails();
	while($row = $result->fetch_assoc()) 
	{
		echo  "<tr align='center'>
		<td><a href=".$row['website'].">
		<img src=".$row['SpathImg']." width='250' height='40'/>
		</a></td>
		<td><B>".$row['Name']."</B></td>
		<td>
		<a href='ProductManagment.php?var=$row[Sid]'>
		<img src='../controllers/images/Add.ico' width='40' height='40'/>
		</a></td>
		<td>
		<a href='modifySupplier.php?var=$row[Sid] '>
		<img src='../controllers/images/Modify.jpg' width='40' height='40'/>
		</td></a>
		<td>
		<a href='deleteSupplier.php?id=$row[Sid]&name=$row[Name] '>
		<img src='../controllers/images/Delete_Icon.png' width='40' height='40'/>
		</a></td></tr>"  ;		
    }
?>
