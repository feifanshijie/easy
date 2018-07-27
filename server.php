<?php

$http = new swoole_http_server("127.0.0.1", 9501);

$http->on("start", function ($server) {
    echo '服务器已启动'.PHP_EOL;
});

$http->on("request", function ($request, $response) {
    $response->header("Content-Type", "text/plain");
    var_dump($request->server['path_info']);
    $response->end("Hello World\n");
});

$http->start();
