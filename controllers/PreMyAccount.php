<?php 
	include_once("../models/user.php");

	$UserID = $_SESSION["UserID"];
	$referrer = $_GET["referrer"];

	$row = user::getUserDetailsByID($UserID);
	
	$SendEmailValue  = ""; $SendSMSvalue = "";
	
	if($row["SendEmail"] == 1)
		$SendEmailValue = "checked";
	
	if($row["SendSMS"] == 1)
		$SendSMSvalue = "checked";
	
	echo "
				<form method='post' name='UpdatePass' action='../controllers/ChangePasswordHandling.php?referrer=" . $referrer . "' >
					<table id='ChangePWtable' style='display:none; margin-left:auto; margin-right:auto; width:350px;'>
					
						<tr><th colspan='2'>Change Password</th></tr>

						<tr><td>Enter The Old Password </td>
						<td><input type='password' name='OldPass' required style='width:90px;'/></td></tr>
						
						<tr><td>Enter The New Password </td>
						<td><input type='password' name='NewPass' required style='width:90px;'/></td></tr>
						
						<tr><td>Renter The New Password </td>
						<td><input type='password' name='NewPassConf' required style='width:90px;'/></td></tr>
						
						<tr><th colspan='2'><input align='center' type='submit' class='button' name='submit' value='Update Password' style='width:140px;'/>
						<img align='right' src='../controllers/images/change-password2.png' width='34px' style='position:absolute;'/>
						</th></tr>
					</table>
				</form>";
	
	
	echo '
	<form name="formR" method="post"
	action="../controllers/MyAccountSettingsHandling.php?referrer=' . $referrer . '" 
	enctype="multipart/form-data">
	<table style="width:90%;">	

	<tr><th colspan="3">Modify Your Account Settings</th></tr>
	
	<tr><td>Name</td><td align="left" align="center">
	<input type="text"  id="name" value="'.$row["UserName"].'" name="UserName" maxlength="25" style="color:gray;" readonly/>
		
		</td>
		
		<td rowspan="8" align="center">
	<img src= "../controllers/images/users/'.$row["UserImagePath"].'" width="280px" height="240px" id="printed_image"/>
	
	</td></tr>

	<tr><td>Email</td><td align="left" align="center">
	<input type="email" id="email" value="'.$row["Email"].'"name="Email" style="width:210px;" required/>
		
		</td></tr>
	 
	<tr><td>Title</td><td align="left" >
	<input type="tel" id="tel" value="'.$row["Title"].'" name="Title" style="width:110px; color:gray;" readonly/>
		
		</td></tr>

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
	
	<tr><td colspan="2"><label style="color:gray;"><b>
	Send SMS to my Cell Phone <input type="checkbox" name="SendSMS" '. $SendSMSvalue .' disabled/></b></label></td>

	<tr><th align="center" colspan="3">
	<input type="submit" class="button" value="Save" name="Save" style="font-weight:bold; margin-left:3px;" />

	&nbsp;
	<input type="reset" class="button" value="Reset" />

	&nbsp;
	<a href="' . $referrer . '">
	<button class="button" type = "button" align="Right">Cancel</button></a>

	</th></tr>
		</table>
	</form>';
?>




