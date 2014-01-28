<?php
/**
# https://github.com/dbtlr/php-airbrake


$ cd ~/airbrake
$ vi composer.json
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar install 



*/
include dirname(__FILE__).'/_init.php';

Airbrake\EventHandler::start($api_key, true);

echo "before uncaught exception\n";
throw new Exception("something is wrong.");
echo "after uncaught exception\n";




