<?php

	$email = "";
	$pass = "";	
	$rememberMe= "";
		
	if (isset($_COOKIE["Email"]) && isset($_COOKIE["Pass"])) 
	{
		$email_from_cookie = $_COOKIE["Email"];
		$pass_from_cookie = $_COOKIE["Pass"];
		
		$email = "value='" . $email_from_cookie . "'";
		$pass  = "value='" . $pass_from_cookie . "'";
		
		$rememberMe = "checked='checked'";
	}

	echo"<td>Username</td><td><input name='Email' type='email' $email id='username' required/></td></tr>
	
	<tr><td>Password</td><td><input name='Pass'type='password' $pass required/></td></tr>
	
	<tr><td colspan='2' align='center' style='background-color:#CCCCCC;'>
	<label><input type='checkbox' name='rememberme' value='1' $rememberMe>
	<b>Remember Me</b></label></td>";
	
?>		