<?php

require 'dbconfig.php';
require './sdk/src/facebook.php';


$facebook = new Facebook(array(
  'appId'  => '195357614005966',
  'secret' => '9dc7b084800c32a16181d63a84d894aa',
));


$user = $facebook->getUser();


if ($user) {
  try {

    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    $user = null;
  }
}

if($user) {
 $params = array(
    'next' => 'http://web.iiit.ac.in/~ayush.mishra/ScheduleMyPost?logout=1'

);
  $logoutUrl = $facebook->getLogoutUrl($params);
}
else {
 $params = array(
    'scope' => 'publish_stream'
    
  );
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl($params);
}

if($user && array_key_exists('publish_stream', $facebook->api("/me/permissions")['data'][0]) ) {

require 'includes/loggedin.php';
	
} else if ($user) {

require 'includes/halfloggedin.php';

}
else {
require 'includes/notloggedin.php';
}
?>
