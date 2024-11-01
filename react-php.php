<?php

require_once 'vendor/autoload.php';


use React\EventLoop\Loop;


$loop = Loop::get();

$timer = $loop->addPeriodicTimer(1, function () {
    echo "Hello World" . PHP_EOL;
});

$loop->run();



