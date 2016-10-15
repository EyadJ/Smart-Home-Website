<?php

/**
 *
 */
	require_once("config.php");

class Cart
{

  /**
     * @var int
     */
    private $uId;

    /**
     * @var int
     */
    private $pId;

    /**
     * @var int
     */
    private $quantity;

	public static function addProductToCart($uId, $pId, $quantity, $cost) {
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$pId = $db->escape_string($pId);
		$quantity = $db->escape_string($quantity);
		$cost = $db->escape_string($cost);
		
		$sql = "INSERT INTO cart (uId, pId, quantity, cost)"
		  . " VALUES ($uId, $pId, $quantity, $cost);";

		  $Quant = Cart::quantityOfOneProduct($uId , $pId);
		  if($Quant >= 0)
		  {
			  $sql = "UPDATE cart SET"
			 . " Quantity = " . ($Quant + 1)
			. " WHERE uId = $uId AND pId = $pId;";
		  }
		  
		$db->query($sql);

		if ($db->affected_rows == 1) 
		{ // one record has been inserted to database successfully
			return TRUE; //"added succefully"
		}
		else 
		{
			return FALSE;  //"problem adding product to cart"
		}
	}

	public static function retriveGrandTotalCost($uId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$sql = "SELECT * FROM cart WHERE uId = $uId;";

		$result = $db->query($sql);

		$grandTotal = 0;
		
		if ($result->num_rows >= 1) // id number exists
		{ 
			while ($row = $result->fetch_assoc())
			{
				$quant = $row["Quantity"];
				$cost = $row["cost"];
				
				$grandTotal += ($quant * $cost);
			}		
			return $grandTotal;
		} 
		else 
		{
			return 0; // unable to find user id
		}
	}
	
	public static function deleteProductFromCart($uId, $pId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$pId = $db->escape_string($pId);
		
		$sql = "DELETE FROM cart "
		  . " WHERE uId = $uId AND pId = $pId;";

		if ($db->query($sql) === TRUE) 
		{ 
		//echo "record deleted successfully";
		} 
		else 
		{
		//echo "error deleting record";
		}
	}
   
	public static function quantityOfOneProduct($uId, $pId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$sql = "SELECT Quantity FROM cart WHERE uId = $uId AND pId = $pId;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1) 
		{ // id number is exist
			$row = $result->fetch_assoc();

			return $row['Quantity'];
		} 
		else 
		{
			return -1; // unable to find user id
		}
	}
	
	
	public static function retriveProductsFromCart($uId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$sql = "SELECT * FROM cart WHERE uId = $uId;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1) 
		{ // id number is exist
	   
			return $result;
		} 
		else 
		{
			return null; // unable to find user id
		}
	}
	
	public static function EmptyCart($uId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		
		$sql = "DELETE FROM cart WHERE uId = $uId;";

		$db->query($sql);
	}

	public static function changeQty($uId, $pId, $quantity) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}

		$uId = $db->escape_string($uId);
		$pId = $db->escape_string($pId);
		$quantity = $db->escape_string($quantity);
		
		$sql = "UPDATE cart "
			. " SET Quantity = $quantity" 
			. " WHERE uId = $uId AND pId = $pId;";

		if ($db->query($sql) === TRUE) 
		{ 
		//echo "record updated successfully";
		} 
		else 
		{
		//echo "error updated record";
		}
	}

	public static function countProductsInCart($uId, $pId) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
		  die('error: unable to connect to database');
		}
		
		$uId = $db->escape_string($uId);
		$pId = $db->escape_string($pId);
		
		$sql = "SELECT count($pId) AS products_count FROM cart WHERE uId = $uId;";

		$result = $db->query($sql);

		if ($result->num_rows >= 1) 
		{ // id number is exist
		  $row = $result->fetch_assoc();

		  $count  = $row['products_count'];
		
		  return $count;
		} 
		else 
		{
			return -1; // unable to order;
		}
	}

     public static function isExist($uId, $pId) 
	 {
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) 
		{
			die('error: unable to connect to database');
		}

		$uId = $db->escape_string($uId);
		$pId = $db->escape_string($pId);
		
		$sql = "SELECT uId FROM cart WHERE uId = $uId AND pId = $pId;";

		$result = $db->query($sql);

		return ($result->num_rows == 1); // id has been found on database
	}


}