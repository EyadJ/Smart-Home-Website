<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"]) || $_SESSION["Admin"] == FALSE){  header("Location: Homepage.php"); } ?>

<html>
<head>
<title>Modify Supplier</title>
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
document.getElementById('Fnamem').innerText = "yor name should include chars only";
formR.Fname.focus();
check=false;
}else if(formR.Fname.value.length<15){
document.getElementById('Fnamem').innerText = "cannot be less then 15 char";
formR.Fname.focus();
check=false;  
}
///////////////////////////////
if(formR.Email.value==""){
    document.getElementById('Emailm').innerText = "Email can not be empty";
    formR.Email.focus();
}
else if(!formR.Email.value.match(mailformat)){
    document.getElementById('Emailm').innerText = "Wrong in Email Syntecst";
    formR.Email.focus();
check=false;  
}
///////////////////////////////
var faxc =/^\+?[0-9]{6,}$/;  
if(formR.fax.value==""){
  document.getElementById('faxm').innerText = "Fax number can not be empty";
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
  document.getElementById('telm').innerText = "phone number can not be empty";
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

function on_image_path_change ()
{
var x =formR.fileToUpload.value;
document.getElementById('printed_image').alt="New Image";
document.getElementById('printed_image').src=x;
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
            <span>Modify Supplier </span>
            <div class="clearfix"></div>
            <hr class="hr-table" />
        </div>
  	
<form name="formR" method="post" action="../controllers/ModifySupplierHandling.php" enctype="multipart/form-data">
<table style="width:800px">	

<?php 
	include_once("../controllers/PreModifySupplier.php");
?>
	    
<tr><td align="center" colspan="2">
<input type="submit" value="Save" name="Save" style="font-weight:bold" onclick="return check();"/>

&nbsp;
<input type="reset" value="Reset" onclick=" clear();"/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="ControlPanal.php">
<button type = "button" align="Right">Cancel</button></a>

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
