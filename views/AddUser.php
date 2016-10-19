<?php /*error_reporting(0);*/ session_start(); if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){ header("Location: Rooms.php"); } ?>

<html>
<head>
<title>Add User</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
<script type="text/javascript">    

</script>

</head>
<body>

     <div class="allcontainer">
	 <img src="../controllers/images/smarthome-background.jpg"
			style="width:100%; position:fixed; top:40px;" /> 
			 
<?php
include_once("../controllers/Header.php");
?> 
            
				<div id='page-container'>
				 <div class='menu'>
				<ul class='ui-menu'>
<?php
	require_once("../controllers/PrintSideMenu.php");
	
	echo (PrintSideMenu::autoPrint(basename(__FILE__)));
?>
				</ul>
				</div>
                <div class="right-div">

			 
     
        <div class="personal-bg-table">
            <span>Add User</span>
            <hr class="hr-table" />
        </div>
           
			
       
  

    
<form name="formR" method="post" enctype="multipart/form-data" action="../controllers/addUserHandling.php">
<table style="width:80%">

<tr><td>Username</td><td align="left">
&nbsp;&nbsp;<input type="text" name="userName" maxlength="25" required/> &nbsp; (First & Last Names) 
    </td>
    </tr>
	<tr><td>Description</td><td align="left">
&nbsp;&nbsp;<input type="text" name="Description" maxlength="20" required/> &nbsp; (Ex: Father, Mother, Son, Daughter..)
    </td>
    </tr>
<tr><td>Email</td><td align="left">
&nbsp;&nbsp;<input type="text" name="email" maxlength="35" required/> &nbsp;
    </td>
    </tr>
<tr><td>Password</td><td align=left>
&nbsp;&nbsp;<input type="password" name="Pass" required/>
        </td>
    </tr>
    <tr><td>ConfirmPassword</td><td align=left>
&nbsp;&nbsp;<input type="password" name="ConPass" required/>
        </td></tr>
	
	<tr><td>Administrator Privilege</td><td align="left">
&nbsp;&nbsp;<input type="checkbox" name="isAdmin" />
    </td>
    </tr>	
		
<tr><td>Img</td><td  align="left">
<input type="file" name="fileToUpload" id="fileToUpload" required/>
    
    </td>
    </tr>    
<tr><td align="left" colspan="2">

&nbsp;&nbsp;<input type="submit" value="Save"/> 
&nbsp;&nbsp;<input type="reset" value="Reset" />
&nbsp;&nbsp;<a href="ControlPanal.php"><button type = "button" >Cancel</button></a> 

</td></tr>

    </table>
</form>

                </div>

                <div class="clearfix">
                <br />
                <br />
                            </div>
            </div>
</body>
</html>
