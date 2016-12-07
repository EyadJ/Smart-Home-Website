<?php 
	include_once("../models/user.php");

	$UserID = $_GET["var"];

	//check if $_GET["var"] was manuplated and changed to other admin's ID
	if(user::isAdmin($UserID))
	{
		header("Location:../views/HomePage.php");
	}

	$row = user::getUserDetailsByID($UserID);
	
	$SendEmailValue  = ""; $SendSMSvalue = "";
	
	if($row["SendEmail"] == 1)
		$SendEmailValue = "checked";
	
	if($row["SendSMS"] == 1)
		$SendSMSvalue = "checked";
	
	
	$text = "";
	if ($row["isDisabled"] == 1)
		$text = "checked";
	
	echo '	
		<form method="post" action="../controllers/ChangePasswordHandling_AdminRights.php?var=' . $UserID . '" >
			<table id="ChangePWtable" style="display:none; margin-left:auto; margin-right:auto; width:350px;">
				
				<tr><th colspan="2">Change Password</th></tr>
				
				<tr><td>Enter The New Password </td>
				<td><input type="password" name="NewPass" required style="width:90px;"/></td></tr>
				
				<tr><td>Renter The New Password </td>
				<td><input type="password" name="NewPassConf" required style="width:90px;"/></td></tr>
				
				<tr><th colspan="2"><input type="submit" class="button" name="UpdatePass" value="Update Password" style="width:140px;"/></th></tr>
			</table>
		</form>';
		
	echo '
	<form name="formR" method="post" 
	action="../controllers/ModifyUserSettingsHandling.php?var=' . $UserID . '" 
	enctype="multipart/form-data">
	<table style="width:90%;">	

	<tr><th colspan="3">Modify <i style="color:#333333; text-shadow:none;">"'.$row["UserName"].'"</i> Settings</th></tr>
	
	<tr><td>Name</td><td align="left" align="center">
	<input type="text"  id="name" value="'.$row["UserName"].'" name="UserName" maxlength="25" required />
		<font color="red"><label ></label></font>
		</td>
		
		<td rowspan="9" align="center">
	<img src= "../controllers/images/users/'.$row["UserImagePath"].'" width="280px" height="240px" id="printed_image"/>
	</td>
		</tr>

	<tr><td>Email</td><td align="left" align="center">
	<input type="email" id="email" value="'.$row["Email"].'"name="Email" style="width:210px;" required/>
		<font color="red"> <label ></label></font>
		</td>
		</tr>
	 
	<tr><td>Title</td><td align="left" >
	<input type="tel" id="tel" value="'.$row["Title"].'" name="Title" style="width:110px;" />
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
	
	<tr style="background-color:#CCCCCC"><td colspan="2"><label><b>Disable Account
	<input type="checkbox" name="isDisabled" ' . $text . '/>
	</b></label></td></tr> 
	 
	<tr><th align="center" colspan="2">Notification Settings (Linked with Tasks)</th></tr>
	
	<tr><td colspan="2"><label><b>
	Send Message to Email <input type="checkbox" name="SendEmail" '. $SendEmailValue .'/></b></label></td>
	
	<tr><td colspan="2"><label><b>
	Send SMS to Cell Phone <input type="checkbox" name="SendSMS" '. $SendSMSvalue .'/></b></label></td>

	<tr><th align="center" colspan="3">
	<input type="submit" class="button"  value="Save" name="Save" style="font-weight:bold; margin-left:3px;" /> &nbsp;
	
	<a href="#" onclick="deleteUserMsg(' . $row["UserID"] . ');return false;" style="text-decoration:none;">
			<button class="button"  type = "button" style="color:red;">Delete</button>
	</a>&nbsp;
		
	<input type="reset" class="button"  value="Reset" /> &nbsp;

	<a href="Users.php" style="text-decoration:none;"> 
	<button class="button"  type = "button" align="Right">Cancel</button> 
	</a>
	
	</th></tr></table>
	</form>';
?>




