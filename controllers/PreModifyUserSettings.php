<?php 
	include_once("../models/user.php");

	$UserID = $_GET["var"];

	//check if $_GET["var"] was manuplated and changed to other admin's ID
	if(user::isAdmin($UserID))
	{
		header("Location:../views/HomePage.php");
	}

	$row = User::getUserDetailsByID($UserID);
	
	echo '
	<form name="formR" method="post" 
	action="../controllers/ModifyUserSettingsHandling.php?var=' . $UserID . '" 
	enctype="multipart/form-data">
	<table >	


	<tr><td>Name</td><td align="left" align="center">
	<input type="text"  id="name" value="'.$row["UserName"].'" name="UserName" maxlength="25" required />
		<font color="red"><label id="Fnamem"></label></font>
		</td>
		
		<td rowspan="6" align="center">
	<img src= "../controllers/images/users/'.$row["UserImagePath"].'" width="280px" height="240px" id="printed_image"/>
	</td>
		</tr>

	<tr><td>Email</td><td align="left" align="center">
	<input type="email" id="email" value="'.$row["Email"].'"name="Email" required/>
		<font color="red"> <label id="Emailm" ></label></font>
		</td>
		</tr>
	 

	<tr><td>Description</td><td align="left" >
	<input type="tel" id="tel" value="'.$row["Description"].'" name="Description" required/>
		<font color="red"> <label id="telm" ></label></font>
		</td>
		</tr>

	<tr><td>Password</td><td align="left" align="center">
	<input type="text"  id="website" value="'.$row["Password"].'" name="Password" maxlength="25" required />
		<font color="red"><label id="websitem"></label></font>
		</td>	
		
	<tr>
	<td>Img</td>
	<td  align="left"><input type="file" name="fileToUpload" /></td>
	</tr>';
?>




