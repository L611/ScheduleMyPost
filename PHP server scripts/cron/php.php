<?php

$connection = mysqli_connect("localhost", "user", "", "test");

function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	        $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
			            $randomString .= $characters[rand(0, strlen($characters) - 1)];
				        }
		        return $randomString;
}


for($i = 0 ; $i < 1000; $i ++) {

$str =  generateRandomString();

$query = "create table mishra$str (id int);";
mysqli_query($connection,$query);

}

?>
