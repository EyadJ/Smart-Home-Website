<?php /*error_reporting(0);*/ session_start();  if(isset($_SESSION["Email"])) header("Location: Rooms.php"); ?>


<html>
<head>
<title>Login page</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link href="../controllers/style.css?d=<?php echo time(); ?>" rel="stylesheet"/>
<style>
table {
    width: 30%;
    border-style: groove;  
}
    </style>

	<script>
	
	//this function was borrowed from stack_over_flow
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
			document.getElementById("logInProblemMessage").innerHTML = 
			"<font color='red'><b>The Email or Password is Not Correct!</b></font>";
			document.getElementById("logInProblemDialog").style.display ="block";	
			document.getElementById("ProblemDialogMsgDim").style.display ="block";	
			document.getElementById("OKbutton").focus();
		}
		else if(unSuccessfullLogIn === "AccountDisabled")
		{
			document.getElementById("logInProblemMessage").innerHTML = 
			"<font color='red'><b>Your Account is Disabled. Contact the Admin</b></font>";
			document.getElementById("logInProblemDialog").style.display ="block";	
			document.getElementById("ProblemDialogMsgDim").style.display ="block";	
			document.getElementById("OKbutton").focus();
		}
	}

function hideLogInProblemDialog() 
{
	document.getElementById("logInProblemDialog").style.display ="none";	
	document.getElementById("ProblemDialogMsgDim").style.display ="none";	
	document.getElementById("username").focus();
}

function LogInFormSubmit()
{
	document.getElementById("LogInForm").submit();	
}

</script>
</head>
<body onload="checkPass();">


 <div class="allcontainer">
	 
	 
	 <div class="dim" id="ProblemDialogMsgDim"></div>  
		<table class="dialog" id="logInProblemDialog" style="width:310px; height:110px; max-height:130px; border: 2px solid black;">
			<tr><td style="padding-top:30px;">
			<b><h3 id="logInProblemMessage"></h3></b>
			</td></tr>
			<tr><th style="height:30px;">	
			
			<a href='#' onclick="hideLogInProblemDialog();return false;" style="text-decoration:none; ">
			<button class='button'  type='button' style="width:70px;" id="OKbutton">Ok</button>
			</a>
			</th></tr>
		</table>
	 
<!----------------------------------------------HEADER START---------------------------------------------->
	 
<div id="page-header">
	<div class="page-logo2">
	 <a href="HomePage.php"><img height="68px;" src="../controllers/images/Capture.png"/></a>
	</div>
</div>
		
<!-----------------------------------------------HEADER END-----------------------------------------------> 
		
	<div style="width:25%; position:absolute; top:15%; bottom:50%; left: 0; right: 0; margin: auto; ">


<form name="LogInForm" id="LogInForm" method="post" action="../controllers/LogInHandling.php">

<table style="top:100px; position:relative; width:420px; background-color:white;">

<th colspan="2" >
<img align="center" src="../controllers/images/login-user.png" width="60px" style="display:inline;"/>
<h1 style="color:black; display:inline; text-shadow: 2px 2px white; ">Log in</h1>
</th>

<tr>

<?php
	include_once("../controllers/PreLogIn.php");
?>

</tr>

    <tr><th colspan="2" align="center" height="30px">
	
	<a href='#' onclick="LogInFormSubmit();return false;" style="text-decoration:none; ">
	<img align="center" src="../controllers/images/login.png" height="45px"/>
	</a>
	</th></tr>
    </table>
</form>
		
		</div>
       
</body>
</html>
