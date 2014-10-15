<?php 
require_once realpath( dirname( __FILE__ ) )  . "/PersistenceInterface.php";
require_once realpath( dirname( __FILE__ ) )  . "/User_Contact.php";

class MySQLPersistence implements Persistence_Interface { 

  // singleton instance 
  private static $client;
  private $connection; 

  // private constructor function 
  private function __construct() { 
    $DB_HOST     =  $this->config( "mysql_host", "localhost");
    $DB_USERNAME =  $this->config( "mysql_user");
    $DB_PASS     =  $this->config( "mysql_password");
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

  public function persistUser(Hybrid_User_Contact $user, $provider = ""){
    $query = "INSERT IGNORE INTO user_profile_info (provider_id, identifier, profile_url, photo_url, display_name, decription, email) VALUES ('$user->identifier, $user->websiteURL, $user->profileURL, $user->photoURL, $user->displayName, $user->description, $user->email);"
  }


} 
?>