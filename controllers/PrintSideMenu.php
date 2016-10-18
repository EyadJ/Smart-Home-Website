<?php


class PrintSideMenu
{
	
	public static function autoPrint($pageName)
	{
		if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == TRUE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
			$string .= PrintSideMenu::printAdmin($pageName);
		} 
		else if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == FALSE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
		} 
		return $string;
    }
	
     public static function printAdmin($page) 
	 {
		$page = str_replace('.php', '', $page);
		
		$isOpen = "";

		$pageNoSpace = str_replace(' ', '', "Control Panal");

		if($pageNoSpace == $page)
		{
			$isOpen = "open-admin";
		}
		
		$text = "<a style='text-decoration: none;' href=" . $pageNoSpace . ".php><li class='li-menu-admin "
		. $isOpen . "'>".
		"<img  style='float: left; ' width='30px' src='../controllers/images/controlPanal.png' />&nbsp;".
		"Control Panal" . 
		/*"<img align='right' width='30px' src='../controllers/images/adminLogo.png' />".*/
		"</li></a>" ;

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
				/*$additional = "<img  width='30px' src='../controllers/images/Rooms.png' />&nbsp;";*/
			}
			if($pages[$i] == "Tasks")
			{
				/*$additional = "<img  width='30px' src='../controllers/images/Tasks.png' />&nbsp;";*/
			}
			
		$text .= "<a style='text-decoration: none;' href=" . $pageNoSpace . ".php><li class='li-menu "
		. $isOpen . "'>" . $additional . $pages[$i] . "</li> </a>" ;
	}

    return $text;
	}
}