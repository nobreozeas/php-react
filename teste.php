<?php

require_once 'vendor/autoload.php';

$streamList = [
    stream_socket_client('tcp://localhost:80'),
    fopen('./documentos/documento1.txt', 'r'),
    fopen('./documentos/documento2.txt', 'r'),
];

//seta o stream para não bloquear
fwrite($streamList[0], 'GET / HTTP/1.1' . PHP_EOL . PHP_EOL);

foreach ($streamList as $stream){
    stream_set_blocking($stream, 0);
}

//verifica se o stream está pronto para leitura
do{
    $read = $streamList;
    $write = null;
    $except = null;
    $timeout = 0;
    $microseconds = 2000000;
    $ready = stream_select($read, $write, $except, $timeout, $microseconds);

    if($ready === 0){
        continue;
    }

    foreach ($read as $key => $stream){
        $conteudo = stream_get_contents($stream);

        $posicaoFimHttp = strpos($conteudo, "\r\n\r\n");
        
        if($posicaoFimHttp !== false){
            $conteudo = substr($conteudo, $posicaoFimHttp + 4);
        } else {
            $conteudo;
        }
        unset($streamList[$key]);
    }
}while(!empty($streamList));

echo "li todos os arquivos" . PHP_EOL;


