<?php
include __DIR__."/_init.php";

Airbrake\EventHandler::start(AIRBRAKE_API_KEY, true, array(
    'component' => 'hoge component' ,
    'action' => 'hoge action' ,
));

include __DIR__."/lib/Test01.php";
include __DIR__."/lib/TestException01.php";

$test = new Test01();
echo "new Test01() complete! \n";
