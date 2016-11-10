<?php
	include_once("../models/user.php");

	$result = user::getUsersDetails();
	while($row = $result->fetch_assoc()) 
	{
		echo
		"<tr align='center'><td>
		<img src='../controllers/images/users/".$row['UserImagePath']."' width='100' height='100'/><br />";
		
		if($row['isAdmin'])
		{
			echo "<img style='float:center; ' src='../controllers/images/administrator.gif' width='130' />
			</td>
			<td><B>".$row['UserName']."</B></td>
			<td>
			<img src='../controllers/images/add-unavailable.png' width='50' height='50'/>
			</td>
			<td>
			<img src='../controllers/images/Modify-unavailable.png' width='50' height='50'/>
			</td></tr>"  ;	
		}
		else
		{
			echo "
			</td>
			<td><B>".$row['UserName']."</B></td>
			<td>
			<a href='UserAuthorisedRooms.php?var=$row[UserID]'>
			<img src='../controllers/images/Add.ico' width='50' height='50'/>
			</a></td>
			<td>
			<a href='modifyUserSettings.php?var=$row[UserID]'>
			<img src='../controllers/images/Modify.jpg' width='50' height='50'/>
			</td></a></tr>"  ;	
			
		}		
    }
?>
