<?php

$socket = stream_socket_server('tcp://localhost:80', $errno, $errstr);

$con = stream_socket_accept($socket);

$espera = rand(1, 5);
sleep($espera);

fwrite($con, "Resposta do scoket apos $espera Hello World");

