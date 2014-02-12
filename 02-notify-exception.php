<?php
include __DIR__."/_init.php";

$options = array();
$config = new Airbrake\Configuration(AIRBRAKE_API_KEY, $options);
$client = new Airbrake\Client($config);

include __DIR__."/lib/TestException01.php";


try {
	throw new TestException01('something is wrong...02');
} catch(Exception $e) {
	$client->notifyOnException($e);
}	

