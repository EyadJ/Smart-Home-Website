 <?php

	include_once("../models/log.php");

	$isAdmin = $_SESSION["isAdmin"];
	$UserID = $_SESSION["UserID"];
	//
	//
	//
		echo"<table style='border:1px solid black; background-color:black;'>
		<tr><td style='height:1px; padding:0px; background-color:black;'></td></tr></table>";
	//
	//
	//
	$LogRecords = log::getNotificationCenterLog();

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
			
			$criticalLogValue = "1px solid black";  $CategoryNameColor = "";
			if($RecordCategoryID === "12" || $RecordCategoryID === "14") 
			{
				$criticalLogValue = "2px solid #E68080";
				$CategoryNameColor = "color:#CC0000; font-weight:700;";
			}
			
			//classes names for filtering
			$LogCategoryValue = "LogCategory_" . $RecordCategoryID . "";
			$isImportantValue = "isImportant"; if(!$isImportant) $isImportantValue = "notImportant"; 
			
			//filler between rows
			echo "<tr style='border:0px; background-color:white; height:5px; $checkedValue ' 
					class='logRecord $LogCategoryValue $isImportantValue'>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				<td style='border:0px;'></td>
				</tr>";

			//table body
			echo"<tr class='logRecord $LogCategoryValue $isImportantValue' style='$checkedValue'>
			
				<td style='border-bottom: $criticalLogValue; border-top: $criticalLogValue; line-height: 1.1;'>
				 <b>" . substr($EntryDate, 0, 10) . "</b> " . substr($EntryDate, 11, 18) . "</td>

				<td style='border-bottom: $criticalLogValue; border-top: $criticalLogValue; line-height: 1.1;'>$Description</td>

				<td style='border-bottom: $criticalLogValue; border-top: $criticalLogValue; line-height: 1.1; $CategoryNameColor'>$CategoryName</td>

				</tr>";

		}
		echo "</table>";
	}
	else // ($LogRecords == NULL)
	{
		echo"<table style='border:0;'><tr>
			<th style='border:0; height:30px; font-family:Courier New, Courier, monospace; font-size:18px; font-weight:800;'>
			There is no Important Notifications to display
			</th>
			</tr></table>";
	}

		echo "<br /><hr class='hr-table-divider' /><hr class='hr-table-divider2' /></span>";





?>
