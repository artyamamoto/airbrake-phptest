<?php
include __DIR__."/_init.php";

/**
 * Class CustomClient
 *
 * Airbrake\Client の protected なメソッドにアクセスが必要なので、カスタムするには
 * 継承するのがよいかと思うが、継承すると基底クラスを Airbrake\Client にしなければならないので、
 * 以下のような方法がよさそう。
 *
 *  - Airbrake\Client を trait として書き直す
 *  - Airbrake のクラスを必要に応じて public とする
 *  - Airbrake のソースを参考にすべて書き直す
 */
class CustomClient extends Airbrake\Client {
    public function __construct() {
        $config = new Airbrake\Configuration(AIRBRAKE_API_KEY, array(
            'environmentName' => 'STAGE',
            'component' => 'hoge component' ,
            'action' => 'hoge action' ,

            'secure' => false,
            'port' => 80,
            'async' => true,
        ));
        parent::__construct($config);
    }

    public function main() {
        try {
            $test = new Test01();
        } catch(Exception $e) {
            $this->notifyOnException($e);
        }
    }

    public function notifyOnException(Exception $exception) {
        $notice = new Airbrake\Notice;
        $notice->load(array(
            'errorClass'   => get_class($exception),
            'backtrace'    => $this->cleanBacktrace($exception->getTrace() ?: debug_backtrace()),
            'errorMessage' => $exception->getMessage().' in '.$exception->getFile().' on line '.$exception->getLine(),
        ));
        return $this->notify($notice);
    }

}

include __DIR__."/lib/Test01.php";
include __DIR__."/lib/TestException01.php";

$client = new CustomClient();
$client->main();

