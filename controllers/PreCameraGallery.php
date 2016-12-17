 <?php

	include_once("../models/device.php");

	$text = "";
	echo "<tr><td>";

	$imgs = device::getAllGalleryMultimedia();
	
	while($row = $imgs->fetch_assoc()) 
	{
		$imgID = $row["MultimediaID"];
		$cameraID = $row["cameraID"];
		$imgDate = $row["imgDate"];
		$imgPath = $row["imgPath"];
		
		$x = 480; $y = 640;
		$height = $x / 3.2; $width = $y / 3.2;  if ($cameraID == 1001){ $height = $y / 3.2; $width = $x / 3.2; }
		
		$text .= "<div
		style='width:" . $width . "px; height:" . $height. "px; display:inline-block; padding:0px;			
		margin-right:2.5px; margin-left:2.5px; margin-bottom:5px; margin-top:5px; border-left: 2px solid black; 
		border-right: 2px solid black; border-bottom: 2px solid black; border-top: 2px solid black;'>
		
		<img src='../Camera_Gallery/$imgPath' width='" . $width . "px' height='" . $height . "px'
		onclick='displayPreview(this.src,$imgID,$width);return false;' id='imgID_$imgID'/></div>";	
		
	}
	
	echo"$text</td></tr>";

?>
