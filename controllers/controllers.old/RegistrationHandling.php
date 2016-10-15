
<?php
//RegistrationHandling	
   
	include_once("../models/user.php");
	
    if (isset($_POST["Fname"])) 
	{
		$insertedSuccessfully = user::addNewUser($_POST['Fname'], $_POST['Bdate'], $_POST['Pass'], $_POST['Email'], $_POST['tel'], $_POST['addrs'], $_POST['ptc']);
     
        if ($insertedSuccessfully) 
		{
            echo "<html>
					<head><script>setTimeout(function(){window.location.href = '../views/HomePage.php'}, 6000);</script></head>
					<body><br /><br /><h3 align='center'>Welcome $_POST[Fname].. please try logging in with your newly created account</h3></body></html>";
        } 
		else 
		{
			echo "<html><body>Sorry $_POST[Fname].. we had a problem, please try again</body></html>";
        }
    }


?>               