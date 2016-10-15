<?php

Class PreLogIn
{
	public static function logInTransactions()
	{
		$email = "";
		$pass = "";	
		$rememberMe="";
		$string = "";
		
	if (isset($_COOKIE['Email']) && isset($_COOKIE['Pass'])) 
	{
		$email_from_cookie = $_COOKIE['Email'];
		$pass_from_cookie = $_COOKIE['Pass'];
		
		$email = 'value='.$email_from_cookie;
		$pass = 'value='.$pass_from_cookie;
		
		$rememberMe = 'checked=checked';
	}

	$string .=  "<tr><td>Email</td><td><input name='Email' type='email' $email required/></td></tr>
	<tr><td>Password</td><td><input name='Pass'type='password' $pass required/></td></tr>
	<tr><td colspan='2' align='left'> &nbsp&nbsp Remember Me: <input type='checkbox' name='rememberme' value='1' $rememberMe>";
	
	return $string;
	}
}
?>		