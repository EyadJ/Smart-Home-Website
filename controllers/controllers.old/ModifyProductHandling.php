<?php 
	include_once("../models/Product.php");
	session_start();

if(FALSE)
{
	$target_dir = "../controllers/images/Products/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) 
		{
			echo "<br />File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} 
		else 
		{
			echo "<br />File is not an image.<br />";
			$uploadOk = 0;
		}
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) 
	{
		echo "<br />Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
	&& $imageFileType != "GIF" )
	{
		echo "<br />Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
		echo "<br />Sorry, your file was not uploaded.<br />";
	// if everything is ok, try to upload file
	} 
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			Product::modifyProductImgSpath($_POST['Pid'], $target_file);
			echo "<br />The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br />";
		}	 
		else 
		{
			echo "<br />Sorry, there was an error uploading your file.<br />";
		}
		
	}
	//echo $target_file;
}
	$modifiedSuccessfully = Product::modifyProductDetails($_POST['Pid'], $_SESSION['supplierId'][$_POST['Sname']], $_POST['Name'],
	$_POST['Cost'], $_POST['CatId'], $_POST['Description']);
     
	//echo $modifiedSuccessfully;
	
	header("Location: ../views/ProductManagment.php?var=$_SESSION[lastSelectedSupplierId]");
?>







