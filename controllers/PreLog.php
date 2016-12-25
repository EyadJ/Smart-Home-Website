 <?php

	include_once("../models/log.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	
	//CHECK is the user deleted veriable Order from the URL
	if (isset($_GET["Order"])) $sqlOrderBy = $_GET["Order"];
	else $sqlOrderBy = "DESC";
	
	//CHECK is the user manuplated veriable Order in the URL
	if($sqlOrderBy !== "ASC" && $sqlOrderBy !== "DESC")
		$sqlOrderBy = "DESC";
	
	//
	//
	//FILTERS
	$LogCategories = log::getLogCategories();

	echo "<table style='width:600px; display:none;' id='FiltersDiv'>
	<tr><th colspan='3'>Log Categories to Display</th></tr>";
	
	
	//this is just to organize the categories
	$i = 11; $j = 0; $strings[0] = ""; $strings[1] = ""; $strings[2] = ""; $strings[3] = "";
	//-------------------------------------//
	
	while($row = $LogCategories->fetch_assoc()) 
	{
		$RecordCategoryID = $row['RecordCategoryID'];
		$CategoryName = $row['CategoryName'];
		$isImportant = $row['isImportant'];
		$checkedValue = ""; if($isImportant) $checkedValue = "checked"; 
		
		$strings[$j] .= "<label><input type='checkbox' onclick='updateVisibleLogRecords(this, $RecordCategoryID);' 
			class='LogCategoryfilter' $checkedValue/>" . str_replace("_", " ", $row["CategoryName"]) . "</label> <br />";
		
		if($i == 14) $j = 1; else if($i == 20) $j = 2; else if($i == 22) $j = 3;
			
		$i++;
	}	
	
	echo "<tr><td align='left'>" . $strings[0] . "</td>" .
	"<td align='left' rowspan='2'>" . $strings[1] . "</td>" .
	"<td align='left' rowspan='2'>" . $strings[3] . "</td></tr>" .
	"<tr><td align='left'>" . $strings[2] . "</td></tr>";
	
	echo "<tr><td colspan='3' style='background-color:#CCCCCC; padding:0px;'><label>
	<a href='#' onclick='showAllLogRecords(this.firstChild);return false;' style='text-decoration:none; display:block; width:100%;'>	
	<input type='checkbox' style='display:none;'/><u><b>Show All</b></u> <b style='color:#990000;'>(" . log::getLogCount() . ")</b>
	</label></a></td></tr>";
	
	
	$selectedText = ""; if($sqlOrderBy === "ASC" ) $selectedText = "selected";
	
	echo"<tr><th colspan='3'>Order Log Records <select onchange='updateSqlOrderBy(this.value);'>
	<option value='DESC'>Newest First</option>
	<option value='ASC' $selectedText>Oldest First</option>
	</select>";
	
	echo"</th></tr></table>
		<table style='border:1px solid black; background-color:black;'>
		<tr><td style='height:1px; padding:0px; background-color:black;'></td></tr></table>";
	//
	//
	//
	$LogRecords = log::getAllLog($sqlOrderBy);

	if (isset($LogRecords))
	{
		//table header
		echo"<table id='viewAllTasksTable' style=' border: none;'>
			<tr style='line-height: 16px;'>
			<th width='14%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Entry Date</th>
			<th width='69%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Description</th>
			<th width='17%' style='border-bottom: 2px solid black; border-top: 2px solid black;'>Category</th>
			</tr>";

		while($row = $LogRecords->fetch_assoc()) 
		{
			$RecordCategoryID = $row["RecordCategoryID"];
			$CategoryName = str_replace("_", " ", $row["CategoryName"]);
			$Description = $row["Description"];
			$EntryDate = $row["EntryDate"];
			$isImportant = $row["isImportant"];
			$checkedValue = ""; if(!$isImportant) $checkedValue = "display:none;"; 
			
			//classes names for filtering
			$LogCategoryValue = "LogCategory_" . $RecordCategoryID . "";
			$isImportantValue = "isImportant"; if(!$isImportant) $isImportantValue = "notImportant"; 
			
			//filler between rows
			echo "<tr style='border:0px; background-color:white; height:5px; $checkedValue' 
					class='logRecord $LogCategoryValue $isImportantValue'>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				</tr>";

			//table body
			echo"<tr class='logRecord $LogCategoryValue $isImportantValue' style='$checkedValue'>
			
				<td style='border-bottom: 1px solid black; border-top: 1px solid black; line-height: 1.1;'>
				 <b>" . substr($EntryDate, 0, 10) . "</b> " . substr($EntryDate, 11, 18) . "</td>

				<td style='border-bottom: 1px solid black; border-top: 1px solid black; line-height: 1.1;'>$Description</td>

				<td style='border-bottom: 1px solid black; border-top: 1px solid black; line-height: 1.1;'>$CategoryName</td>

				</tr>";

		}
		echo "</table>";
	}
	else // ($LogRecords == NULL)
	{
		echo"<table style='border:0;'><tr>
			<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
			There is no Log Records to display
			</th>
			</tr></table>";
	}

		echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' /></span>";





?>
