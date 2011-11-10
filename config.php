<?php
date_default_timezone_set('Asia/jerusalem');
$title = "msby url";
$root = "C:/wamp/www/msurl";
$http_root = "http://any-pc.p:8080/msurl";

function rand_string( $length ) 
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
					
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) 
	{
		@$str .= $chars[ rand( 0, $size - 1 ) ];
	}			
	return $str;
}

function url_exists($url)
{
	if ((strpos($url, "http")) === false)
	$url = "http://" . $url;
	if (is_array(@get_headers($url)))
	return 1;
	else
	return 0;
}
?>