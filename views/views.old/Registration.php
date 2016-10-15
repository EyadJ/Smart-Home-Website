<?php error_reporting(0); session_start(); ?>

<html>
<head>
    <title>Registration Page</title>
   <link href="../controllers/style.css" rel="stylesheet"/>

</head>
<body>
    <div class="allcontainer">
            <div id="page-header">
                <div class="page-logo">
				
<?php
include_once("../controllers/Header.php");
?> 
				
				
                </div>
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


     <div class="table-hoder">
        <div class="personal-bg-table">
            <span>Registration</span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  

    
    <form name="formR" method="post" action="../controllers/RegistrationHandling.php">
<table align="center" style="width:500px">
      <th colspan="2">Please Fill This Boxes</th>
    <tr><td>Full Name</td>
        <td align=left><input type="text" name="Fname" autofocus required/>
        <font color="red"><label id="Fnamem"></label></font>
        </td></tr>
    <tr><td>Brthdate</td><td align=left><input type="date" name="Bdate"  required/></td></tr>
    <tr><td>Password</td> 
<td align=left><input type="password" name="Pass" required/>
<font color="red"><label id="passm"></label></font>
        </td>
    </tr>
    <tr><td>ConfirmPassword</td>
<td align=left><input type="password" name="ConPass" required/>
       <font color="red"> <label id="cpassm" ></label></font>
        </td></tr>
    <tr><td>Email</td> <td align=left><input type="email" name="Email" required />
               <font color="red"> <label id="Emailm" ></label></font>
        </td>
    </tr>
    <tr><td>Telephone</td> <td align=left><input type="tel" name="tel" required/>
        <font color="red"> <label id="telm" ></label></font>
        </td>
    
    </tr>
    <tr><td>Address</td> <td align=left><input type="text" name="addrs" maxlength="30" required/></td></tr>
    <tr><td>Post Code</td> <td align=left><input type="postcode" name="ptc" />
                <font color="red"> <label id="ptcm" ></label></font>
        </td></tr>
    <tr><td  align=center colspan="2"><input type="submit" value="Submit" onclick="return chak();"/> <input type="reset" value="Reset"  onclick=" cler();" /></td></tr>

        </table>  
    </form>

                </div>

                <div class="clearfix"></div>
                <br />
                <br />
                </div>
</body>
</html>