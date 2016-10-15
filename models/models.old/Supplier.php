<?php


/**
 *
 */
	require_once("config.php");

class Supplier
{

    /**
     * @var int
     */
    private $Sid;

    /**
     * @var String
     */
    private $Name;

    /**
     * @var String
     */
    private $Email;

    /**
     * @var long
     */
    private $fax;

    /**
     * @var long
     */
    private $Telephone;

    /**
     * @var String
     */
    private $SpathImg;

    /**
     * @var String
     */
    private $website;



    /**
     * @param void $int
     * @param void $String
     * @param void $String
     * @param void $long
     * @param void $long
     * @param void $String
     * @param void $String
     */
    

	public static function addNewSupplier($Name, $Email, $fax, $Telephone, $SpathImg, $website) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		/**
		 * in the following lines we escape quotation such as ' and "
		 */
		$Name = $db->escape_string($Name);
		$Email = $db->escape_string($Email);
		$fax = $db->escape_string($fax);
		$Telephone = $db->escape_string($Telephone);
		$SpathImg = $db->escape_string($SpathImg);
		$website = $db->escape_string($website);

		$sql = "INSERT INTO supplier (Name, Email, fax, Telephone, SpathImg, website)"
		  . " VALUES ('$Name', '$Email', $fax, $Telephone, '$SpathImg', '$website');";

		$db->query($sql);

		if ($db->affected_rows == 1) // one record has been inserted to database successfully
		{ 
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}


	public static function modifySupplierDetails($Sid, $Name, $Email, $fax, $Telephone, $website) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		//in the following lines we escape quotation such as ' and "
		
		$Sid = $db->escape_string($Sid);
		$Name = $db->escape_string($Name);
		$Email = $db->escape_string($Email);
		$fax = $db->escape_string($fax);
		$Telephone = $db->escape_string($Telephone);
		$website = $db->escape_string($website);

		$sql = "UPDATE supplier "
			. " SET Name = '$Name'" 
			. " ,Email = '$Email'" 
			. " ,fax = '$fax'" 
			. " ,Telephone = '$Telephone'" 
			. " ,website = '$website'" 
			. " WHERE Sid = $Sid;";

		if ($db->query($sql)) //TRUE
		{ 
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}

	public static function modifySupplierSpathImg($Sid, $SpathImg) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		//in the following lines we escape quotation such as ' and "
		
		$SpathImg = $db->escape_string($SpathImg);

		$sql = "UPDATE supplier "
			. " SET SpathImg = '$SpathImg'" 
			. " WHERE Sid = $Sid;";

		if ($db->query($sql) == TRUE) 
		{ 
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}
	}

	public static function getSupplierNameForAll() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$sql = "SELECT Name FROM supplier;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1) 
		{ 
			return $result;
		} 
		else 
		{
			return "error"; 
		}
	}

	public static function getSupplierIdByName($name) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$name = $db->escape_string($name);
		//var_dump($name);
		$sql = "SELECT Sid FROM supplier WHERE Name = '$name';";
		
		$result = $db->query($sql);
		//var_dump($result);

		if ($result == TRUE) 
		{ // id number is exist
			$row = $result->fetch_assoc();
			$Sid = $row['Sid'];
			//var_dump($row);
			//var_dump($Sid);

			return $Sid;
		} 
		else 
		{
			return "unable to find name"; // unable to find name;
		}
	}

	  
	public static function getSupplierIdAndNameForAll() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$sql = "SELECT Sid, Name FROM supplier;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1) // id number exists
		{ 
		 
			//$row = $result->fetch_assoc();
			//$Name = $row['Name'];
		
		  return $result;
		} 
		else 
		{
		  return "unable to find id"; // unable to find id;
		}
	}
	  
	  
	public static function getSuppliersDetails() 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$sql = "SELECT * FROM supplier;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1)  // id number exists
		{ 
			return $result;
		} 
		else 
		{
			return "unable to find id"; // unable to find id;
		}
	}

	public static function retriveSupplier($Sid)
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		$Sid = $db->escape_string($Sid);

		$sql = "SELECT * FROM supplier WHERE Sid = $Sid;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1)  // id number exists
		{ 
			$row = $result->fetch_assoc();
			
			return $row;
		} 
		else 
		{
			return "unable to find id"; // unable to find id;
		}
	}
	  
	public static function deleteSupplierByName($Sname) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Sname = $db->escape_string($Sname);
		
		$sql = "DELETE FROM supplier WHERE Name = '$Sname';";
		
		$result = $db->query($sql);

		if ($result) //is true 
		{ 
			return "Supplier Deleted Successfully";
		} 
		else 
		{
			return "**Error**<br /> <br />Error Description: Problem Deleting Supplier<br /> 
			If there is products registered to this supplier you should delete them first in order to delete the supplier"; 
		}
	}

}
