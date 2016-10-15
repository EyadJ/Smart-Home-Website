<?php


class PrintSideMenu
{
	
	public static function autoPrint($pageName)
	{
		if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == TRUE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
			$string .= PrintSideMenu::printCustomer($pageName);
			$string .= PrintSideMenu::printAdmin($pageName);
		} 
		else if (isset($_SESSION["Email"]) && $_SESSION["Admin"] == FALSE) 
		{
			$string = PrintSideMenu::printNormal($pageName);
			$string .= PrintSideMenu::printCustomer($pageName);
		} 
		else 
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
		
		$text = "<a href=" . $pageNoSpace . ".php><li class='li-menu-admin "
		. $isOpen . "'>".
		"<img  width='30px' src='../controllers/images/controlPanal.png' />&nbsp;".
		"Control Panal" . 
		"<img align='right' width='30px' src='../controllers/images/adminLogo.png' />".
		"</li></a>" ;

		return $text;
	}

	public static function printCustomer($page) 
	{
		$page = str_replace('.php', '', $page);
		
		$text = "";

		$pages = array
		(
		"Search",
		"Cart",
		"Orders"
		);

		for($i = 0; $i < 3; $i++)
		{
			$isOpen = "";
			$additional= "";
			
			$pageNoSpace = str_replace(' ', '', $pages[$i]);

			if($pageNoSpace == $page)
			{
				$isOpen = "open-cust";
			}
			if($pages[$i] == "Orders")
			{
				$additional = "<img  width='30px' src='../controllers/images/orders.png' />&nbsp;";
			}
			if($pages[$i] == "Search")
			{
				$additional = "<img  width='30px' src='../controllers/images/search.png' />&nbsp;";
			}
			if($pages[$i] == "Cart")
			{
				$additional = "<img  width='30px' src='../controllers/images/cart.png' />&nbsp;";
			}
			
			$text .= "<a href=" . $pageNoSpace . ".php><li class='li-menu-cust "
				. $isOpen . "'>" . $additional. $pages[$i] . 
				"<img style='float:right;' width='30px' src='../controllers/images/custLogo.png' />".
				"</li> </a>" ;
		}

		return $text;
	}

	public static function printNormal($page) 
	{
	$page = str_replace('.php', '', $page);
	
	$text = "";

	$pages = array
	(
	"Home Page",
	"Suppliers",
	"Contact Us",
	"About Us"
	);

	for($i = 0; $i < 4; $i++)
	{
		$isOpen = "";
		$additional= "";
			
			$pageNoSpace = str_replace(' ', '', $pages[$i]);

			if($pageNoSpace == $page)
			{
				$isOpen = "open";
			}
			if($pages[$i] == "Home Page")
			{
				$additional = "<img  width='30px' src='../controllers/images/homepage.png' />&nbsp;";
			}
			if($pages[$i] == "Suppliers")
			{
				$additional = "<img  width='30px' src='../controllers/images/suppliers.png' />&nbsp;";
			}
			if($pages[$i] == "Contact Us")
			{
				$additional = "<img  width='30px' src='../controllers/images/contactus.png' />&nbsp;";
			}
			if($pages[$i] == "About Us")
			{
				$additional = "<img  width='30px' src='../controllers/images/aboutus.png' />&nbsp;";
			}
			
		$text .= "<a href=" . $pageNoSpace . ".php><li class='li-menu "
		. $isOpen . "'>" . $additional . $pages[$i] . "</li> </a>" ;
	}

    return $text;
	}
}