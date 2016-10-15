<?php


/**
 *
 */
	require_once("config.php");

class category
{


    /**
     * @var int
     */
    private $CatId;

    /**
     * @var String
     */
    private $Name;


  public static function getCategoryNameById($CatId) {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }

    $CatId = $db->escape_string($CatId);
    $sql = "SELECT Name FROM category WHERE CatId = $CatId;";

    $result = $db->query($sql);

    if ($result->num_rows >= 1) { // id number is exist
      $row = $result->fetch_assoc();

      $CatId  = $row['CatId'];

      return $CatId;
    } else {
      return ""; // unable to find catId;
    }
  }

public static function getCategoryIdByName($Name) {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }

    $Name = $db->escape_string($Name);
    $sql = "SELECT CatId FROM category WHERE Name = '$Name';";

    $result = $db->query($sql);

    if ($result->num_rows >= 1) { // id number is exist
      
		$row = $result->fetch_assoc();
		$CatId  = $row['CatId'];

      return $CatId;
    } else {
      return "unable to find catId"; // unable to find catId;
    }
  }

public static function getCategoryNameForAll() {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }

    $sql = "SELECT Name FROM category";

    $result = $db->query($sql);

    if ($result->num_rows >= 1) { 
      //$row = $result->fetch_assoc();
      //$CatId  = $row['CatId'];

      return $result;
    } else {
      return "unable to find Name";
    }
  }

  
public static function getCategoryIdAndNameForAll() {
    $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE);
    if ($db->connect_errno > 0) {
      die('error: unable to connect to database');
    }

    $sql = "SELECT CatId, Name FROM category";

    $result = $db->query($sql);

    if ($result->num_rows >= 1) { 
      //$row = $result->fetch_assoc();
      //$CatId  = $row['CatId'];

      return $result;
    } else {
      return "unable to find CatId, Name";
    }
  }
  
}
