<?php
include __DIR__."/_init.php";

$options = array();
$config = new Airbrake\Configuration(AIRBRAKE_API_KEY, $options);
$client = new Airbrake\Client($config);

try {
	throw new Exception('something is wrong.');
} catch(Exception $e) {
	$client->notifyOnError($e->getMessage());
}	

