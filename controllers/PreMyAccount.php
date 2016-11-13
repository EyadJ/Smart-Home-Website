<?php 
	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];

	$row = user::getUserDetailsByID($UserID);
	
	$SendEmailValue  = ""; $SendSMSvalue = "";
	
	if($row["SendEmail"] == 1)
		$SendEmailValue = "checked";
	
	if($row["SendSMS"] == 1)
		$SendSMSvalue = "checked";
	
	echo '
	<form name="formR" method="post" 
	action="../controllers/MyAccountSettingsHandling.php?var=' . $UserID . '" 
	enctype="multipart/form-data">
	<table style="width:90%;">	

	<tr><th colspan="3">Modify Your Account Settings</th></tr>
	
	<tr><td>Name</td><td align="left" align="center">
	<input type="text"  id="name" value="'.$row["UserName"].'" name="UserName" maxlength="25" required />
		<font color="red"><label ></label></font>
		</td>
		
		<td rowspan="8" align="center">
	<img src= "../controllers/images/users/'.$row["UserImagePath"].'" width="280px" height="240px" id="printed_image"/>
	</td>
		</tr>

	<tr><td>Email</td><td align="left" align="center">
	<input type="email" id="email" value="'.$row["Email"].'"name="Email" style="width:210px;" required/>
		<font color="red"> <label ></label></font>
		</td>
		</tr>
	 
	<tr><td>Title</td><td align="left" >
	<input type="tel" id="tel" value="'.$row["Title"].'" name="Title" style="width:110px;" readonly/>
		<font color="red"> <label ></label></font>
		</td>
		</tr>

	<tr><td>Cell Phone</td><td align=left>
		<input type="number" name="CellPhone" value=' . $row["CellPhone"] . ' alt="506807058"/>
        </td>
    </tr>
	
	<tr>
	<td>Img</td>
	<td  align="left"><input type="file" name="fileToUpload" /></td>
	</tr>
	
	<tr><th align="center" colspan="2">Notification Settings (Linked with Tasks)</th></tr>
	
	<tr><td colspan="2"><label><b>
	Send Message to my Email <input type="checkbox" name="SendEmail" '. $SendEmailValue .'/></b></label></td>
	
	<tr><td colspan="2"><label><b>
	Send SMS to my Cell Phone <input type="checkbox" name="SendSMS" '. $SendSMSvalue .'/></b></label></td>

	<tr><th align="center" colspan="3">
	<input type="submit" class="button" value="Save" name="Save" style="font-weight:bold; margin-left:3px;" />

	&nbsp;
	<input type="reset" class="button" value="Reset" />

	&nbsp;
	<a href="HomePage.php">
	<button class="button" type = "button" align="Right">Cancel</button></a>

	</th></tr>
		</table>
	</form>';
?>




