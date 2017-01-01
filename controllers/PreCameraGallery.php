 <?php

	include_once("../models/device.php");

	$text = "<tr><td>";
	
	$Multimedia = device::getAllGalleryMultimedia();
	
	$oldMultimediaDate = "";
	$IDcounter = 1000;
	
	while($row = $Multimedia->fetch_assoc()) 
	{
		$multimediaID = $row["MultimediaID"];
		$cameraID = $row["cameraID"];
		$isImage = $row["isImage"];
		$multimediaDate = $row["imgDate"];
		$multimediaPath = $row["imgPath"];
		
		
		if($oldMultimediaDate != $multimediaDate)
		{
			$oldMultimediaDate = $multimediaDate;
			
			if($IDcounter != 1000)
				$text .= "</td></tr></table>
						<h3 align='left' style='background-color:#CCCCCC; width:160px; margin-bottom:-11px; margin-top:40px;'>$multimediaDate</h3>
						<table><tr><td>";

			else //$IDcounter == 1000
				$text .= "<h3 align='left' style='background-color:#CCCCCC; width:160px; margin-bottom:-11px; margin-top:40px;'>$multimediaDate</h3>
						<table><tr><td>";
			
			$text .= "<table style='border:0px solid black; margin-top:-11px; margin-bottom:2px; width:100%; background-color:black;'>
					<tr><td style='height:1px; padding:0px; background-color:#FFFFFF;'></td></tr></table>";
		}
	
		$x = 133; $y = 178; //$x = 480; $y = 640;
		$height = $x; $width = $y; $cameraName = "Side Camera"; 
		if ($cameraID == 1001){ $height = $y; $width = $x; $cameraName = "Roof Camera"; }
		
		$text .= "<div
		style='width:" . $width . "px; height:" . $height. "px; display:inline-block; padding:0px;			
		margin-right:2.5px; margin-left:2.5px; margin-bottom:5px; margin-top:5px; border-left: 2px solid black; 
		border-right: 2px solid black; border-bottom: 2px solid black; border-top: 2px solid black;'>";
		
		if($isImage)
		{
			$text .= "<img src='../Camera_Gallery/$multimediaPath' width='" . $width . "px' height='" . $height . "px'
			onclick='displayPreview(this.src,$IDcounter,$width);return false;' id='imgID_$IDcounter' />
			<input type='hidden' value='$multimediaDate' id='imgDate_$IDcounter'/>	
			<input type='hidden' value='$cameraName' id='imgCamera_$IDcounter'/> ";	
			$IDcounter++;
		}
		else //$isImage == FALSE (Video)
		{
			$text .= "
			<video width='$width' height='$height' controls>
			<source src='../Camera_Gallery/$multimediaPath' type='video/mp4'>
			Your browser does not support the video tag.
			</video>";	
		}
		
		$text .= "</div>";
	}
	$text .= "</td></tr></table>";
				
	echo"$text</td></tr>";

?>
