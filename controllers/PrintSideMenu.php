<?php


class PrintSideMenu
{
	
	public static function autoPrint($pageName)
	{
		if (isset($_SESSION["Email"]) && $_SESSION["isAdmin"] == TRUE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
			$string .= PrintSideMenu::printAdmin($pageName);
		} 
		else if (isset($_SESSION["Email"]) && $_SESSION["isAdmin"] == FALSE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
		} 
		return $string;
    }
	
     public static function printAdmin($page) 
	 {
		$page = str_replace('.php', '', $page);
		
		$isOpen = "";
		$pageNoSpace = str_replace(' ', '', "Users");

		if($pageNoSpace == $page)
			$isOpen = "open";
		
		$text = "<a style='text-decoration: none;' href=" . $pageNoSpace . ".php><li class='li-menu "
		. $isOpen . "'>".
		"&nbsp;<span class='menu-item-text'>Users</span>" . 
		"<img style='position:absolute; right:10%; margin-top:2px; width:38px;' src='../controllers/images/Users.png' />".
		"</li></a>";
		
		$text .= "<img width='23px' height='86px;' style='position:absolute; right:100%;' src='../controllers/images/admin.png'/>";
		
		$isOpen = "";
		$pageNoSpace = str_replace(' ', '', "Log");

		if($pageNoSpace == $page)
			$isOpen = "open";
		
		$text .= "<a style='text-decoration: none;' href=" . $pageNoSpace . ".php?Order=DESC><li class='li-menu "
		. $isOpen . "'>".
		"&nbsp;<span class='menu-item-text'>Log</span>" . 
		"<img  style='position:absolute; right:10%; margin-top:2px; width:38px;' src='../controllers/images/Log.png' />".
		"</li></a>";
		
		

		return $text;
	}

	public static function printNormal($page) 
	{
	$page = str_replace('.php', '', $page);
	
	$text = "";

	$pages = array
	(
	"Rooms",
	"Tasks"
	);

	for($i = 0; $i < 2; $i++)
	{
		$isOpen = "";
		$additional= "";
			
			$pageNoSpace = str_replace(' ', '', $pages[$i]);

			if($pageNoSpace == $page)
			{
				$isOpen = "open";
			}
			
			if($pages[$i] == "Rooms")
			{
				$additional = 
				"<img  style='position:absolute; right:7%; margin-top:2px; width:43px;' src='../controllers/images/Rooms.png'/>";
			}
			if($pages[$i] == "Tasks")
			{
				$additional = 
				"<img  style='position:absolute; right:11%; margin-top:1.5px; width:34px;' src='../controllers/images/Tasks.png'/>";
			}
			
		$text .= "<a style='text-decoration: none;' href=" . $pageNoSpace . ".php><li class='li-menu "
		. $isOpen . "'>" . $additional . "&nbsp;<span class='menu-item-text'>" . $pages[$i] . "</span>" . "</li> </a>" ;
	}

    return $text;
	}
}