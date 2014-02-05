<?
include __DIR__."/_init.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Javascript Test</title>

    <!-- https://github.com/airbrake/airbrake-js#airbrake-js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/airbrake-shim.js"
            data-airbrake-project-id="<?= AIRBRAKE_API_PROJECT_ID ?>"
            data-airbrake-project-key="<?= AIRBRAKE_API_KEY ?>"
            data-airbrake-environment-name="production"></script>
    <script>
(function($) {
    var log = function(s) {
        var $ul = $("#main-log ul");
        if ($ul.size() <= 0)
            $ul = $("<ul />").appendTo("#main-log");
        $('<li />').text(s).appendTo($ul);
    };
    var MyError = Error;
    var raise_error = function(s) {
        throw new MyError(s);
    };

    jQuery(function() {
        log('jQuery.ready');
        log('関数開始前');
        (Airbrake.wrap(function() {
            raise_error('イベリア半島に行きたい。');
        }))();
        log('関数開始後');

    });
})(jQuery);
    </script>
</head>
<body>
    <div id="main-log"></div>
</body>
</html>