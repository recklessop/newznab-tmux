<?php

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'bootstrap/autoload.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle($request = Illuminate\Http\Request::capture());
$response->send();
$kernel->terminate($request, $response);
