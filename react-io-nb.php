<?php

require_once 'vendor/autoload.php';

use React\EventLoop\Loop;
use React\Stream\ReadableResourceStream;

$loop = Loop::get();

$stream = new ReadableResourceStream(fopen('documentos/react-php-doc.txt', 'r'), $loop);

$stream->on('data', function (string $data) {
    echo $data;
});


$loop->run();