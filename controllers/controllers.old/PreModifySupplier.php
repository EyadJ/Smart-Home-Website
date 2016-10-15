<?php 
	include_once("../models/Supplier.php");

	$_SESSION['lastSelectedSupplierId']= $_GET["var"];

	$row = Supplier::retriveSupplier($_GET["var"]);
	
echo '
<tr><td>Name</td><td align="left" align="center">
<input type="text"  id="name" value="'.$row["Name"].'" name="name" maxlength="25" required />
    <font color="red"><label id="Fnamem"></label></font>
    </td>
	
	<td rowspan="6" align="center">
<img src= "'.$row["SpathImg"].'" width="400px" height="180px" id="printed_image"/>
</td>
    </tr>

<tr><td>Email</td><td align="left" align="center">
<input type="email" id="email" value="'.$row["Email"].'"name="Email" required/>
    <font color="red"> <label id="Emailm" ></label></font>
    </td>
    </tr>
 
<tr><td>fax</td><td align="left" align="center">
<input type="tel"  id="fax" value="'.$row["fax"].'" name="fax" maxlength="12"/>
        <font color="red"> <label id="faxm" ></label></font>
    </td>
    </tr>
    
<tr><td>Telephone</td><td align="left" >
<input type="tel" id="tel" value="'.$row["Telephone"].'" name="tel" required/>
    <font color="red"> <label id="telm" ></label></font>
    </td>
    </tr>

<tr><td>Website</td><td align="left" align="center">
<input type="text"  id="website" value="'.$row["website"].'" name="website" maxlength="25" required />
    <font color="red"><label id="websitem"></label></font>
    </td>	
	
<tr><td>Img</td><td  align="left">
<input type="file" value="'.$row["SpathImg"].'" name="fileToUpload" id="fileToUpload" onchange="on_image_path_change();"/>
    </td>
    </tr>'
?>




