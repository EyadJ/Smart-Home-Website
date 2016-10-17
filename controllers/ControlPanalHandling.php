<?php
	include_once("../models/User.php");

	$result = User::getUsersDetails();
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
			<img src='../controllers/images/add-unavailable.png' width='40' height='40'/>
			</td>
			<td>
			<img src='../controllers/images/Modify-unavailable.png' width='40' height='40'/>
			</td>
			<td>
			<img src='../controllers/images/Delete_Icon-unavailable.png' width='40' height='40'/>
			</td></tr>"  ;	
		}
		else
		{
			echo "
			</td>
			<td><B>".$row['UserName']."</B></td>
			<td>
			<a href='RoomsAuthorisation.php?var=$row[userID]'>
			<img src='../controllers/images/Add.ico' width='40' height='40'/>
			</a></td>
			<td>
			<a href='modifyUserSettings.php?var=$row[userID]'>
			<img src='../controllers/images/Modify.jpg' width='40' height='40'/>
			</td></a>
			<td>
			<a href='deleteUser.php?var=$row[UserName]'>
			<img src='../controllers/images/Delete_Icon.png' width='40' height='40'/>
			</a></td></tr>"  ;	
		}		
    }
?>
