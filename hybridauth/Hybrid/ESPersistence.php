<?php 

require 'vendor/autoload.php';

require_once realpath( dirname( __FILE__ ) )  . "/PersistenceInterface.php";
require_once realpath( dirname( __FILE__ ) )  . "/User_Contact.php";
require_once realpath( dirname( __FILE__ ) )  . "/User_Profile.php";

use Elasticsearch;

class ESPersistence implements Persistence_Interface { 

  // singleton instance 
  private static $client;


  // private constructor function 
  private function __construct() { 
    // Connect to localhost:9200:                                                                                                                                                                               
    self::$client = new Elasticsearch\Client(
	 array(
	       'hosts' => array('localhost:9200'),
	       'connectionPoolClass' => '\Elasticsearch\ConnectionPool\SniffingConnectionPool'
	       )
	);

  }

  public function persistContact(Hybrid_User_Contact $user, $provider = "", $srcProfile=""){
    
    self::$client->index(
	  array(
	      'index'       => "contacts",
	      'type'        => $srcProfile.$provider,
              'id'          => $user->identifier,
              'body'        => array (
			     'provider'    => $provider,
			     'identifier'  => $user->identifier,
			     'websiteURL'  => $user->websiteURL,
			     'profileURL'  => $user->profileURL,
			     'photoURL'    => $user->photoURL,
			     'displayName' => $user->displayName,
			     'description' => $user->description,
			     'email'       => $user->email
				      )
		)
	)
		       
      }


  public function persistProfile (Hybrid_User_Profile $profile, $provider = ""){

    self::$client->index(
	  array(
	      'index'       => "profiles",
	      'type'        => $provider,
              'id'          => $profile->identifier,
              'body'        => array (
			     'provider'    => $provider,
			     'identifier'  => $profile->identifier,
			     'websiteURL'  => $profile->websiteURL,
			     'profileURL'  => $profile->profileURL,
			     'photoURL'    => $profile->photoURL,
			     'displayName' => $profile->displayName,
			     'description' => $profile->description,
			     'firstName'   => $profile->firstName,
			     'lastName'    => $profile->lastName,
			     'gender'      => $profile->gender,
			     'language'    => $profile->langiage,
			     'age'         => $profile->age,
			     'birthDay'    => $profile->birthDay,
			     'birthMonth'  => $profile->birthMonth,
			     'birthYear'   => $profile->birthYear,
			     'email'       => $profile->email,
			     'emailVerified'       => $profile->emailVerified,
			     'phone'      => $profile->phone,
			     'address'    => $profile->address,
			     'country'    => $profile->country,
			     'region'     => $profile->region,
			     'city'       => $profile->city,
			     'zip'        => $profile->zip
			 )
		)
	)


  }

  public function persistActivity(Hybrid_User_Activity $activity, $provider = "", $userId = ""){
    
    self::$client->index(
	  array(
	      'index'       => "activities",
	      'type'        => $provider,
              'id'          => $userId,
              'body'        => array (
			     'provider'    => $provider,
			     'identifier'  => $user->identifier,
			     'websiteURL'  => $user->websiteURL,
			     'profileURL'  => $user->profileURL,
			     'photoURL'    => $user->photoURL,
			     'displayName' => $user->displayName,
			     'description' => $user->description,
			     'email'       => $user->email
				      )
		)
	)
		       
      }





} 
?>