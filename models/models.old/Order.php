<?php


/**
 *
 */
	require_once("config.php");

class order
{

    /**
     * @var int
     */
    private $orderId;

    /**
     * @var int
     */
    private $uId;

    /**
     * @var int
     */
    private $productId;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $totalcost;

public static function createNewOrder($orderId, $uId, $productId, $quantity, $cost) {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }
    
	$length = count($productId);

	for ($x = 0; $x <= length; $x++) {

	 $sql = "INSERT INTO order "
		  . " VALUES ($orderId[$x], $uId[$x], $productId[$x], $Quantity[$x], $cost[$x]);";

    $db->query($sql);
	} 

    if ($db->affected_rows == 1) { // one record has been inserted to database successfully
		// echo 'order was created sccessfully';
    } else {
      die('order was not created sccessfully');
    }
  }


public static function getTotalcost($orderId) {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }
    
    $orderId = $db->escape_string($orderId);
   
   $sql = "SELECT sum(cost) AS total_sum FROM order WHERE orderId = $orderId;";

    $result = $db->query($sql);

    if ($result->num_rows >= 1) { // id number is exist
      $row = $result->fetch_assoc();

      $sum  = $row['total_sum'];
    
      return $sum;
    } else {
      return -1; // unable to order;
    }
  }


}
