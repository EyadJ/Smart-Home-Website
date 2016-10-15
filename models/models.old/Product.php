<?php


/**
 *
 */
	require_once("config.php");

class Product
{

    /**
     * @var int
     */
    private $Pid;

    /**
     * @var int
     */
    private $Sid;

    /**
     * @var String
     */
    private $Name;

    /**
     * @var void
     */
    private $Cost;

    /**
     * @var void
     */
    private $CatId;

    /**
     * @var String
     */
    private $PImgPath;

    /**
     * @var String
     */
    private $Description;


	public static function addNewProduct($Sid, $Name, $Cost, $CatId, $PImgPath, $Description) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Sid = $db->escape_string($Sid);
		$Name = $db->escape_string($Name);
		$Cost = $db->escape_string($Cost);
		$CatId = $db->escape_string($CatId);
		$PImgPath = $db->escape_string($PImgPath);
		$Description = $db->escape_string($Description);

		$sql = "INSERT INTO product (Sid, Name, Cost, CatId, PImgPath, Description)"
		  . " VALUES ('$Sid', '$Name', $Cost, $CatId, '$PImgPath', '$Description');";

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

	public static function modifyProductDetails($Pid, $Sid, $Name, $Cost, $CatId, $Description) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$Pid = $db->escape_string($Pid);
		$Sid = $db->escape_string($Sid);
		$Name = $db->escape_string($Name);
		$Cost = $db->escape_string($Cost);
		$CatId = $db->escape_string($CatId);
		$Description = $db->escape_string($Description);

		$sql = "UPDATE product "
			. " SET Pid = $Pid" 
			. " ,Sid = $Sid" 
			. " ,Name = '$Name'" 
			. " ,Cost = $Cost" 
			. " ,CatId = $CatId" 
			. " ,Description = '$Description'" 
			. " WHERE Pid = $Pid;";

		if ($db->query($sql) == TRUE) 
		{ 
			echo "record updated successfully";
		} 
		else 
		{
			echo "error updating record";
		}
	}
	
	public static function modifyProductImgSpath($Pid, $PImgPath) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		//in the following lines we escape quotation such as ' and "
		
		$PImgPath = $db->escape_string($PImgPath);
		$Pid = $db->escape_string($Pid);

		$sql = "UPDATE supplier "
			. " SET PImgPath = '$PImgPath'" 
			. " WHERE Pid = $Pid;";

		if ($db->query($sql) === TRUE) 
		{ 
			return "PImgPath updated successfully";
		} 
		else 
		{
			return "error updating PImgPath";
		}
	}
	
	public static function retriveProductDetails($Pid) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Pid = $db->escape_string($Pid);
		$sql = "SELECT * FROM product WHERE Pid = $Pid";

		$result = $db->query($sql);

		if ($result->num_rows >= 1)  // id number is exist
		{ 
			$row = $result->fetch_assoc();
			return $row;
		} 
		else 
		{
			return NULL; // unable to find customer id;
		}
	}
	
	public static function getCost($Pid) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Pid = $db->escape_string($Pid);
		$sql = "SELECT Cost FROM product WHERE Pid = $Pid";

		$result = $db->query($sql);

		if ($result->num_rows >= 1)  // id number is exist
		{ 
			$row = $result->fetch_assoc();
			return $row['Cost'];
		} 
		else 
		{
			return 0; // unable to find customer id;
		}
	}
	
	public static function retriveProductDetailsBySupplierId($Sid) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Sid = $db->escape_string($Sid);
		$sql = "SELECT * FROM product WHERE Sid = $Sid";

		$result = $db->query($sql);

		if ($result != NULL && $result->num_rows >= 1)  // id number is exist
		{ 
			return $result;
		} 
		else 
		{
			return NULL; // unable to find customer id;
		}
	}

	//this function will retrive products of ALL suplliers using only category Id to differentiate
	public static function retriveProductsIdsUsingCategory($CatId) 
	{ 
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$CatId = $db->escape_string($CatId);
		$sql = "SELECT Pid FROM product WHERE CatId = $CatId ";

		$result = $db->query($sql);

		if ($result->num_rows >= 1)  // id number exists
		{ 
			$row = $result->fetch_assoc();

			$Pid  = $row['Pid'];
		  
			return $Pid;
		} 
		else 
		{
			return 0; // unable to find customer id;
		}
	}

		//this function will search products using supllier Id & category Id
	public static function searchProductsByOneSupplier($CatId, $Sid, $keyWord) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Sid = $db->escape_string($Sid);
		$CatId = $db->escape_string($CatId);
		$keyWord = $db->escape_string($keyWord);

		$sql = "SELECT * FROM product WHERE CatId = $CatId AND Sid = $Sid";

		if(strlen($keyWord) > 0)
		{
			$sql .= " AND Name LIKE '%$keyWord%'";
		}
		
		$result = $db->query($sql);
		//var_dump($result);

		if ($result  == TRUE)   // id number exists
		{
			//$row = $result->fetch_assoc();
			//$Pid  = $row['Pid'];
			//var_dump($result);

			return $result;
		} 
		else 
		{
			return NULL; // unable to find customer id;
		}
	}

	public static function searchProducts($CatId, $AllSidText, $keyWord) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$AllSidText = $db->escape_string($AllSidText);
		$CatId = $db->escape_string($CatId);
		$keyWord = $db->escape_string($keyWord);
		
		$sql = "SELECT * FROM product WHERE CatId = $CatId AND Sid IN ($AllSidText)";
		
		if(strlen($keyWord) > 0)
		{
			$sql .= " AND Name LIKE '%$keyWord%'";
		}
		
		$result = $db->query($sql);
		
		//var_dump($AllSidText);
		//var_dump($sql);
		//var_dump($result);

		if ($result == TRUE)  // id number exists
		{ 
			//$row = $result->fetch_assoc();
			//$Pid  = $row['Pid'];
			//var_dump($row);
			//var_dump($Pid);

			return $result;
		} 
		else 
		{
			return NULL; // No Products were Found;
		}
	}

	public static function deleteProduct($Pid) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$Pid = $db->escape_string($Pid);
	 
		$sql = "DELETE FROM product WHERE Pid = $Pid;";

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
	  
  
}
