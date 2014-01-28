<?php
include __DIR__."/_init.php";

$options = array();
$config = new Airbrake\Configuration($api_key, $options);
$client = new Airbrake\Client($config);

try {
	throw new Exception('something is wrong.');
} catch(Exception $e) {
	$client->notifyOnException($e);
}	

