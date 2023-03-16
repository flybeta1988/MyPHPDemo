<?php
$logfile = dirname(__FILE__). "/../logs/test.log";
return array(
    'rootLogger' => array(
        'appenders' => array('default'),
    ),
    'appenders' => array(
        'default' => array(
            'class' => 'LoggerAppenderFile',
            'layout' => array(
                'class' => 'LoggerLayoutPattern',
                'params' => [
                    'conversionPattern' => '%date{Y-m-d H:i:s} %level: %n%msg%n%n'
                ]
            ),
            'params' => array(
                'file' => '/home/flybeta/dev/code/php/MyPHPDemo/logs/test.log',
                //'file' => $logfile,
                'append' => true
            )
        )
    )
);
