<?php 
	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];

	$row = user::getUserDetailsByID($UserID);
	
	echo '
	<form name="formR" method="post" 
	action="../controllers/ModifyUserSettingsHandling.php?var=' . $UserID . '" 
	enctype="multipart/form-data">
	<br />
	<table style="width:70%;">	


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
	 

	<tr><td>Title</td><td align="left" >
	<input type="tel" id="tel" value="'.$row["Title"].'" name="Title" required/>
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
	</tr>
	
	<tr><td align="center" colspan="2">
	<input type="submit" value="Save" name="Save" style="font-weight:bold; margin-left:3px;" />

	&nbsp;
	<input type="reset" value="Reset" />

	&nbsp;

	<a href="HomePage.php">
	<button type = "button" align="Right">Cancel</button></a>

	</td></tr>
		</table>
	</form>';
?>




