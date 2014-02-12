<?php

include dirname(__FILE__).'/_init.php';

Airbrake\EventHandler::start(AIRBRAKE_API_KEY, true);

echo "before uncaught exception\n";


throw new Exception("something is wrong. 07");
echo "after uncaught exception\n";




