<?php
/**
 * - redis サーバーの立ち上げ
 *   $ /usr/local/bin/redis-server &
 *
 * - PHP Rescue 監視プロセス
 *   $ QUEUE=airbrake APP_INCLUDE=vendor/airbrake/airbrake-php/src/Airbrake/Client.php php vendor/chrisboulton/php-resque/resque.php
 *
 * - PHP Rescue ダウンロード
 */

include dirname(__FILE__).'/_init.php';
include dirname(__FILE__).'/vendor/chrisboulton/php-resque/lib/Resque.php';

// redis が動作していることが前提
//queue
Airbrake\EventHandler::start(AIRBRAKE_API_KEY, true, array(
    'queue' => 'airbrake' ,
));

echo "before uncaught exception\n";
throw new Exception("something is wrong. 06");
echo "after uncaught exception\n";




