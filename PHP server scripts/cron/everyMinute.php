<?php

include '/ug/ug2k13/csd/ayush.mishra/public_html/ScheduleMyPost/sdk/src/facebook.php';
date_default_timezone_set('Asia/Calcutta');

$facebook = new Facebook(array(
	'appId'  => '195357614005966',
	'secret' => '9dc7b084800c32a16181d63a84d894aa',
));


function getToken($user) {

	$connection = mysqli_connect("localhost","user","","test");
	$result = mysqli_query($connection,"SELECT access_token from sampleusers WHERE fid=$user;");
	$result = mysqli_fetch_assoc($result);
	return $result['access_token'];
}

$connection =  mysqli_connect("localhost","user","","test");
$query = "SELECT * from samplescheduled_tasks WHERE date=".date('d')." and month =".date('m')." and year=".date('Y')." and hours=".date('G')." and minutes =".date('i')." and posted = 0;";
$result = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($result)) {


	$user = $row['fid'];
	$message = $row['message'];
	$access_token = getToken($user);
	$facebook->setAccessToken($access_token);
	
	$resultt=file_get_contents("https://graph.facebook.com/me/feed/?access_token=".urlencode(trim($access_token))."&message=".urlencode(trim($message))."&method=post&type=post");

	mysqli_query($connection,"UPDATE samplescheduled_tasks SET posted = 1 WHERE sno = $row[sno]");

}

?>
