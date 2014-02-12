## 参考URL
https://github.com/dbtlr/php-airbrake

## install (composer)
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install 

## Redisでキューイングを行う場合

#### redis サーバーの立ち上げ
    $ /usr/local/bin/redis-server &

#### PHP Rescue 監視プロセス
    $ QUEUE=airbrake APP_INCLUDE=vendor/airbrake/airbrake-php/src/Airbrake/Client.php php vendor/chrisboulton/php-resque/resque.php

#### PHP Rescue ダウンロード
composer.json を参照

## メモ
 * ログアウト=>ログインでプロジェクトへのアクセス権限の設定がリセットされる？

 * エラーの画面からGithubにIssueを簡単に作れる
 * バックトレースからGithubにリンクされるが、GithubのソースURLにエラーのURL情報をそのままくっつけているため、リンクが壊れている。
   * JavascriptではURLはhttp://から始まるし、そうでなくてもGithubのソースをルートディレクトリにしないと動作しないなんて微妙すぎる。。。
   * そうなるように Airbrakeのソースを修正すればちゃんとしたリンクになるかも。

 * 管理画面UI
  * 何かを更新したときにメッセージが出ないため、わかりにくい気がする。（上にスクロールしたら更新完了？）
