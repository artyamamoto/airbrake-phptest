<?php


include dirname(__FILE__).'/_init.php';

Errbit::instance()
    ->configure(array(
        'api_key' => AIRBRAKE_API_KEY ,
        'host' => 'kazuo-bit.herokuapp.com',
        'port' => 80 ,
        'secure' => false,
        'project_root' => __DIR__,
        'environment_name' => 'production',
        //'params_filter' => array('/password/','/card_number/'),
        //'backtrace_filters' => array(),
    ))
    ->start();

session_start();
$_SESSION["this_script_is_"] = __FILE__;

try {
    throw new Exception("oh! an error has occurred!");
} catch(Exception $e) {
    Errbit::instance()->notify($e, array('controller'=>"UserController","action"=>"show"));
}
echo "b";
