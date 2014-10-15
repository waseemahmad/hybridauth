<?php
/**
* Exactle Inc.
* http://exactle.net
* (c) 2009-2014, Waseem
*/

/**
 * Exactle Persistence  manager interface
 */

require_once realpath( dirname( __FILE__ ) )  . "/User_Contact.php";
require_once realpath( dirname( __FILE__ ) )  . "/User_Profile.php";
require_once realpath( dirname( __FILE__ ) )  . "/User_Activity.php";
interface Persistence_Interface
{


  // Persist a user contacts' information for each provider
  public function persistContact(Hybrid_User_Contact $user, $provider = "")
   
  // Persist a user profile
  public function persistUser(Hybrid_User_Profile $profile, $provider = "")
  
  // Persist user activity

  public function persistActivity(Hybrid_User_Activity $activity, $provider = "")

}
