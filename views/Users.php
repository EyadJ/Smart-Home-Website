<?php /*error_reporting(0);*/ session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: HomePage.php"); } ?>

<html >
<head >
<title>Users</title>
   
    <link href="../controllers/style.css" rel="stylesheet"/>

   
  <script>
  
function HideUnhideDiv1() 
{
	var x = document.getElementById("right-div1").style.display;	
	
	if (x=="none")
	{
		document.getElementById("right-div1").style.display ="inline";
		document.getElementById("right-div1-hidden").style.display ="none";
	}
	else
	{
		document.getElementById("right-div1").style.display ="none";
		document.getElementById("right-div1-hidden").style.display ="inline";
	}
}


function HideUnhideNewUser() 
{
	var x = document.getElementById("AddNewUserTable").style.display;	
		
	if (x=="none")
	{
		document.getElementById("AddNewUserTable").style.display ="block";	
	}
	else
	{
		document.getElementById("AddNewUserTable").style.display ="none";
	}
}

  </script>
  
  
</head>
<body>

           <div class="allcontainer">
	
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
            <span>Users</span>
            <hr class="hr-table" />
        </div>
  </div>
	
	
	

<div id="right-div1-hidden" class="right-div" style="display:none;">	

		<div class="personal-bg-table" align="center" style="line-height: 40%;"> <hr class="hr-table-hidden-div"/>.<br />.<br />.</div>	

<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-plus-green2.png"
				id="div-plus1"
				width="35px" 
				height="35px" 
				style="
				margin-left:97.5%;
				margin-top:-7.5%;
				" />
	</a>
	
<div class="hidden-right-div-secondary-title" style="width:175px;"><b>Users Management</b></div>

	
</div>



	
	<div id="right-div1" class="right-div">

		<a  href="#" onclick="HideUnhideDiv1();return false;" style="text-decoration:none; ">	
		<img src="../controllers/images/div-minus-red.png"
				id="div-minus1"
				width="40px" 
				height="40px" 
				style="
				margin-left:97.5%;
				margin-top:-1.5%;
				" />
		</a>		
		<br />
		
		
            <div class="right-div-secondary-title" style="width:175px;"><b>Users Management</b></div>
            		
	<div style=" margin-left:auto; margin-right:auto; width:50px;">
		<a  href="#" onclick="HideUnhideNewUser();return false;" style="text-decoration:none; ">
			<div class="tooltip"><span class="tooltiptext">Add new user</span>
				<img align="center" src="../controllers/images/addUser4.png" width="60" height="60" />
			</div>
		</a>
	</div>
    
	
	<!----------------------------------------------------------------->
<form name="formR" method="post" enctype="multipart/form-data" action="../controllers/addUserHandling.php">
<table id='AddNewUserTable' style="width:80%; display:none;">

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
&nbsp;&nbsp;<a href="Users.php"><button type = "button" >Cancel</button></a> 

</td></tr>

    </table>
</form>

  <!----------------------------------------------------------------->
	
	
<form method="post">
<table >
	<thead><tr>
	<th width="20%" >Img</th>
	<th width="30%" >Name</th>
	<th width="10%" >Rooms<br />Authorisation</th>
	<th width="10%" >Modify User Settings</th>
	<th width="10%" >Delete<br />User</th>
	</tr></thead>

<?php
 include_once("../controllers/PreUsers.php");
?>

</table>
</form>
	
       	<br /><br /><br />
		</div>

		
    
	
</body>
</html>
