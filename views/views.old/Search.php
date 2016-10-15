<?php error_reporting(0); session_start();  if(!isset($_SESSION["Email"])){  header("Location: Homepage.php"); } ?>


<?php
	include_once("../controllers/PreSearch.php");
?>

<html>
<head>
<title>Search</title>
    <link href="../controllers/style.css" rel="stylesheet"/>
	
	
	<script type="text/javascript">

			function checkedCheckBoxes()
			{
				document.getElementById("checkbox_checker").innerHTML = "";
				var numOfCheckBoxesSelected=0;
				var i = 0;
				var chk_arr = document.getElementsByName("supplier[]");
				var len = chk_arr.length;
				
				while(i < len)
				{
					if(chk_arr[i].checked) 
					{
						numOfCheckBoxesSelected++;
					}
					i++;
				}
				return numOfCheckBoxesSelected;
			}
			
			function submitClicked()
			{
				if (checkedCheckBoxes() > 0)
				{
					document.forms["myForm"].submit();
				}
				else
				{
					document.getElementById("checkbox_checker").innerHTML = "You Must check at least one Brand!";
				}
			}

			function ALL_checkbox()
			{
			var i = 0;
			var chk_arr  = document.getElementsByName("supplier[]");
			var numOfSupplier = chk_arr.length;
			var ALLcheckbox  = document.getElementById("ALL").checked;
			
			var ALL_checkbox_value = false;
			if (ALLcheckbox)
			{
				ALL_checkbox_value = true;
			}
			while(i < numOfSupplier)
				{					
					var checkbox_value = chk_arr[i];
					chk_arr[i].checked = ALL_checkbox_value;
					i++;
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

                            
      <div class="personal-bg-table">
            <span>Search</span>
            <hr class="hr-table" />
        </div>
                            
<form name="myForm" method="get" action="../controllers/SearchHandling.php">

<table >
   <col width="20%">   <col width="80%">

    <tr><th colspan="2" align=center> Search Products</th></tr>

<tr><td> Select Brand</td>

<td align=left> 


<?php
	$string = PreSearch::retriveSupplierNames();
	echo $string;
?>
	<br />	
	<label> <input type='checkbox' name = 'ALL' value = 'ALL' id = "ALL" onchange='ALL_checkbox();'/><font color="red"><b>ALL</b></font></label>	
	
<div> <b><font id='checkbox_checker' color = 'red'></font></b></div>

</td>
</tr>

<tr><td> Select Device Category</td>
   


<td>

 <select id = "category" name = "category">

 <?php
	$string = PreSearch::retriveCategoryNames();
	echo $string;
?>

 </select>

  </td>
 </tr>
 
 <tr><td>Type Keyword (Optional)</td><td><input type="text" name="keyWord"/> </td></tr>

  <tr><td colspan=2>
<a href="#" onclick="submitClicked();">
			<img src='../controllers/images/search.png' width='40' height='40'/>
			</a>
   <!--<button type="button" onclick="submitClicked();">Search</button> -->
	</td>

  </tr>
  
</table>

</form>


<!-- search result -->

    <table border = "0" cellspacing="10" cellpadding ="5" 
  bgcolor="white" align= "center">

<?php  
include_once("../controllers/SearchResultHandling.php");   
?>
  
	</table>
<!-- search result ended-->
	
		</div>
	</div>
</body>

</html>