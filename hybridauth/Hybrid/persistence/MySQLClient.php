<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/exactle/config/config.php";
include ($path);

class MySQLClient { 

  // singleton instance 
  private static $client;
  private $connection; 

  // private constructor function 
  private function __construct() { 
    global $DB_HOST, $DB_USERNAME, $DB_PASS;
    $con = mysql_connect("$DB_HOST", "$DB_USERNAME", "$DB_PASS");
    if (!$con) {
      die('Could not connect to MySQL: ' . mysql_error());
    } 
    $this->connection = $con;
  } 

  // getInstance method 
  public static function getInstance() { 

    if(!self::$client) { 
      self::$client = new self(); 
    } 
    return self::$client; 

  } 

  public function selectDB($db_name){
     return mysql_select_db("$db_name");
  }

  public function query($sql_query){
    return mysql_query($sql_query, self::getInstance()->connection );
  }
} 
?>