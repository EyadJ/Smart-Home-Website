<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>Add Supplier</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
<script type="text/javascript">    
function clear(){
document.getElementById('Fnamem').innerText = "";
document.getElementById('Emailm').innerText = "";
document.getElementById('telm').innerText = "";
document.getElementById('faxm').innerText = "";
}
    function check(){

    clear();
var check=true;    
var massg="password ";    
var massg2="password "; 
var FullNamecheck = /^[a-zA-Z]+$/;      
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
///////////////////////////////
if(formR.Fname.value==""){
document.getElementById('Fnamem').innerText = "cannot be impty";
 }
else if(!formR.Fname.value.match(FullNamecheck)){
document.getElementById('Fnamem').innerText = "yor name is joust inclod chars";
formR.Fname.focus();
check=false;
}else if(formR.Fname.value.length<15){
document.getElementById('Fnamem').innerText = "cannot be less then 15 char";
formR.Fname.focus();
check=false;  
}
///////////////////////////////
if(formR.Email.value==""){
    document.getElementById('Emailm').innerText = "Email can ot be empty";
    formR.Email.focus();
}
else if(!formR.Email.value.match(mailformat)){
    document.getElementById('Emailm').innerText = "Wrong in Emil Syntecst";
    formR.Email.focus();
check=false;  
}
///////////////////////////////
var faxc =/^\+?[0-9]{6,}$/;  
if(formR.fax.value==""){
  document.getElementById('faxm').innerText = "Fax number can ot be empty";
     formR.fax.focus();
        check=false;  
}
else if(!formR.fax.value.match(faxc)){
        document.getElementById('faxm').innerText = "Fax number like XXX-XXX";
     formR.fax.focus();    
    check=false;  
}  
///////////////////////////////
var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
if(formR.tel.value==""){
  document.getElementById('telm').innerText = "phone number can ot be empty";
     formR.tel.focus();
        check=false;  
}
else if(!formR.tel.value.match(phoneno)){
        document.getElementById('telm').innerText = "phone number like XXX-XXX-XXXX";
     formR.tel.focus();    
    check=false;  
}  
///////////////////////////////
    if(check){
        return true;
    }else{
    return false;
    }
    

}
</script>

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
            <span>Add Supplier </span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  

    
<form name="formR" method="post" enctype="multipart/form-data" action="../controllers/AddSupplierHandling.php">
<table>

<tr><td>Name</td><td align="left">
&nbsp;&nbsp;<input type="text" name="name" maxlength="25" required/>
    <font color="red"><label id="Fnamem"></label></font>
    </td>
    </tr>
<tr><td>Email</td><td align="left">
&nbsp;&nbsp;<input type="email" name="Email" required/>
    <font color="red"> <label id="Emailm" ></label></font>
    </td>
    </tr> 
<tr><td>fax</td><td align="left">
&nbsp;&nbsp;<input type="tel" name="fax" maxlength="12"/>
        <font color="red"> <label id="faxm" ></label></font>
    </td>
    </tr>    
<tr><td>Telephone</td><td align="left">
&nbsp;&nbsp;<input type="tel" name="tel" />
    <font color="red"> <label id="telm" ></label></font>
    </td>
    </tr>
<tr><td>Website</td><td align="left">
&nbsp;&nbsp;<input type="text" name="website" />
    <font color="red"> <label id="website" ></label></font>
    </td>
    </tr>	
<tr><td>Img</td><td  align="left"><input type="file" name="fileToUpload" id="fileToUpload" />
    
    </td>
    </tr>    
<tr><td align="left" colspan="2">

&nbsp;&nbsp;<input type="submit" value="Save"  onclick="return check();"/> 
&nbsp;&nbsp;<input type="reset" value="Reset" onclick=" clear();"/>
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
