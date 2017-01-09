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
			var text = "<font color='red'><b>The Email or Password is Not Correct!</b></font>";
			document.getElementById("logInProblemDialog").style.display ="block";	
			document.getElementById("ProblemDialogMsgDim").style.display ="block";	
			document.getElementById("OKbutton").focus();
			
			var count = getParameterByName('count');
			var time = getParameterByName('time');
			
			if(count < 5)
			{
				text = text + "<br />After (" + (5 - count) + ") Wrong Entries you will wait 1 Minute";
				document.getElementById("logInProblemMessage").innerHTML = text;
			}
			else if (count == 5)
			{
				text = text + "<br />Please wait <div id='timer' style='color:white; font-weight: bold; background:black;'>" + 
				"<span id='time'></span></div> Minutes before trying again";
				
				document.getElementById("logInProblemMessage").innerHTML = text;
				
				assignTimerValue(time);
				
				document.getElementById("OKbutton").style.display = "none";
				document.getElementById("logInProblemDialog").style.height = "180px";
			}			
			else if (count < 10)
			{
				text = text + "<br />After (" + (10 - count) + ") Wrong Entries you will wait 5 Minutes";
				document.getElementById("logInProblemMessage").innerHTML = text;
			}
			else if (count >= 10)
			{
				text = text + "<br />Please wait <div id='timer' style='color:white; font-weight: bold; background:black;'>" + 
				"<span id='time'></span></div> Minutes before trying again";
				
				document.getElementById("logInProblemMessage").innerHTML = text;
				
				assignTimerValue(time);
				
				document.getElementById("OKbutton").style.display = "none";
				document.getElementById("logInProblemDialog").style.height = "180px";
			}
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
	
function startTimer(duration, display) 
{
    var timer = duration, minutes, seconds;
	
    refreshIntervalId = setInterval(function () 
	{
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) 
		{
			clearInterval(refreshIntervalId);
			window.location.href = "LogIn.php";
        }
    }, 1000);
	
}

function assignTimerValue(Minutes) 
{	
	display = document.querySelector('#time');
	startTimer(Minutes, display);
}

window.onkeydown = function(event)
{ 
	if ( event.keyCode == 13 ) //Enter
		LogInFormSubmit(); 
	
	else if ( event.keyCode == 116) //F5
	{
		window.stop();
		window.location.href = "../controllers/LogInHandling.php";
	}
};

</script>
</head>
<body onload="checkPass();">


 <div class="allcontainer">
	 
	 
	 <div class="dim" id="ProblemDialogMsgDim"></div>  
		<table class="dialog" id="logInProblemDialog" style="width:310px; height:110px; max-height:130px; border: 2px solid black;">
			<tr><td>
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
		
	

<form name="LogInForm" id="LogInForm" method="post" action="../controllers/LogInHandling.php">

<table style="width:420px; position:absolute; top:35%; left: 0; right: 0; margin: auto; background-color:white;">

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
		
		
       
</body>
</html>
