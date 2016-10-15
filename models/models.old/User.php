<?php


/**
 *
 */
require_once("config.php");

	include_once("Cart.php");
	include_once("Category.php");
	include_once("Order.php");
	include_once("Product.php");
	include_once("Supplier.php");

class User
{
	
    /**
     * @var int
     */
    private $uId;

    /**
     * @var String
     */
    private $FullName;

    /**
     * @var String
     */
    private $Birthdate;

    /**
     * @var String
     */
    private $Password;

    /**
     * @var String
     */
    private $Email;

    /**
     * @var long
     */
    private $Telephone;

    /**
     * @var String
     */
    private $Address;

    /**
     * @var boolean
     */
    private $isAdmin;



    /**
     * @param void $int
     * @param void $String
     * @param void $String
     * @param void $String
     * @param void $String
     * @param void $long
     * @param void $String
     * @param void $boolean
     */
    

	public static function addNewUser($Name, $Bdate, $password, $email, $Telephone, $address, $postcode) 
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
		$Bdate = $db->escape_string($Bdate);
		$password = $db->escape_string($password);
		$email = $db->escape_string($email);
		$Telephone = $db->escape_string($Telephone);
		$address = $db->escape_string($address);
		$postcode = $db->escape_string($postcode);
		$isAdmin = 0;
	
		$sql = "INSERT INTO user (uId, FullName, Brthdate, Password, Email, Telephone, Address, PostCode, isAdmin) "
		  . " VALUES (NULL, '$Name', '$Bdate', '$password', '$email', '$Telephone', '$address', $postcode, $isAdmin);";

		$db->query($sql);

		if ($db->affected_rows == 1) 
		{ // one record has been inserted to database successfully

		  return TRUE;
		} 
		else 
		{
		 die('unable to insert a new user into the database');
		}
	}


	public function moveFromCartToOrder($uId) 
	{
		$productsCountInCart = Cart::countProductsInCart($uId);

		$orderToCreate = Cart::retriveProductsFromCart($uId);

		order::createNewOrder(
		($orderToCreate->$uId), ($orderToCreate->$productId),
		($orderToCreate->$quantity), ($orderToCreate->$cost));
		
		Cart::EmptyCart($uId);
	}

	public static function isAdmin($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT isAdmin FROM user WHERE Email = '$email';";
		//var_dump($sql);
		
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 
			$row = $result->fetch_assoc();

			$admin  = $row['isAdmin'];
			if($admin == 1)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else 
		{
			return NULL;
		}
	}


	public static function addProduct2Cart($email, $pId) 
	{
		$quantity = 1;
		
		$cost = Product::getCost($pId);
		
		$uId = User::getUserIdByEmail($email);
		
		$status = Cart::addProductToCart($uId, $pId, $quantity, $cost);
				//die($status);

		return $status;
	}


	public static function logInAttempt($email, $pass) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$pass = $db->escape_string($pass);
		$sql = "SELECT uId FROM user WHERE Email = '$email' AND Password = '$pass';";
		//var_dump($sql);
		
		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 						
			return TRUE;
		}
		else 
		{
			return FALSE;
		}
	}

	public static function getFullName($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT FullName FROM user WHERE Email = '$email';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$Fname  = $row['FullName'];
			return $Fname;
		}
		else 
		{
			return "couldn't find email";
		}
	}

	public static function getUserIdByEmail($email) 
	{
		$db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
		if ($db->connect_errno > 0) {
		  die('error: unable to connect to database');
		}

		$email = $db->escape_string($email);
		$sql = "SELECT uId FROM user WHERE Email = '$email';";

		$result = $db->query($sql);
	 
		if ($result->num_rows >= 1)  // id number exists
		{ 			
			$row = $result->fetch_assoc();
			$uId  = $row['uId'];
			return $uId;
		}
		else 
		{
			return "couldn't find user";
		}
	}

	





	
	
	
	
	
	
	
	
	


}
