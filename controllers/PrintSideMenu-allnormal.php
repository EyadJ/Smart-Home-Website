<?php

class PrintSideMenu
{
	public static function autoPrint($pageName)
	{
		$string = "";
		if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == TRUE) 
		{
			$string = PrintSideMenu::printAdmin($pageName);
		}
		else if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == FALSE) 
		{
			$string = PrintSideMenu::printCustomer($pageName);
		}
		return $string;
    }
	
     public static function printAdmin($page) 
	 {
		$page = str_replace('.php', '', $page);
		
		$text = "";

		$pages = array
		(
		"Rooms",
		"Tasks",
		"Control Panal"
		);

		for($i = 0; $i < 3; $i++)
		{
			$isOpen = "";

			$pageNoSpace = str_replace(' ', '', $pages[$i]);

			if($pageNoSpace == $page)
				{
					$isOpen = "open";
				}
			
				$text .= "<a href=" . $pageNoSpace . ".php><li class='li-menu "
				. $isOpen . "'>" . $pages[$i] . "</li> </a>" ;
			
		}
		return $text;
	}

	public static function printCustomer($page) 
	{
		$page = str_replace('.php', '', $page);
		
		$text = "";

		$pages = array
		(
		"Rooms",
		"Tasks",
		);

		for($i = 0; $i < 2; $i++)
		{
			$isOpen = "";

			$pageNoSpace = str_replace(' ', '', $pages[$i]);

			if($pageNoSpace == $page)
			{
				$isOpen = "open";
			}

			$text .= "<a href=" . $pageNoSpace . ".php><li class='li-menu "
				. $isOpen . "'>" . $pages[$i] . "</li> </a>" ;
		}

		return $text;
	}
}