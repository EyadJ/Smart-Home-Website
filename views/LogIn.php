<?php /*error_reporting(0);*/ session_start();  if(isset($_SESSION["Email"])) header("Location: Rooms.php"); ?>


<html>
<head>
<title>Login page</title>
 <link href="../controllers/style.css" rel="stylesheet"/>
<style>
table {
    width: 30%;
    border-style: groove;  
}
    </style>

	<script>
	function getParameterByName(name, url) 
	{
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

	var unSuccessfullLogIn = getParameterByName('message');
	
	function checkPass()
	{
		if(unSuccessfullLogIn === "InCorrectPassword")
		{
			document.getElementById("logInProblem").innerHTML = "<font color='red'><b>The Email or Password is Not Correct!</b></font>";
		}
		else if(unSuccessfullLogIn === "AccountDisabled")
		{
			document.getElementById("logInProblem").innerHTML = "<font color='red'><b>Your Account is Disabled. Contact the Admin</b></font>";
		}
	}
	</script>
</head>
<body onload="checkPass();">


 <div class="allcontainer">
	 
<div id="page-header">
	<div class="page-logo2">
	 <a href="HomePage.php"><img height="80px;" src="../controllers/images/Capture.PNG"/></a>
	</div>
</div>
				
	<div style="width:50%;position: absolute; top: 15%; left: 0; right: 0; bottom: 50%; margin: auto; ">


<form name="formR" method="post" action="../controllers/LogInHandling.php">
<table align="center" style="top:100px; position:relative; width:420px; background-color:white;">
<th colspan="2" ><h1 style="color:black;">Log in</h1></th>

<?php
	include_once("../controllers/PreLogIn.php");
	
	$string = PreLogIn::logInTransactions();
	
	echo $string;
?>
	<div id="logInProblem"  align='center'></div>
	</td></tr>
    <tr><td colspan="2" align="center"><button style=" width:100px;" type="submit">log in</button></td></tr>
    </table>
</form>
     
		
		</div>
       
</body>
</html>
