<?php

if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php') {
    header("Location: /filmes");
    exit;
}

define('APP_DIR', __DIR__ . '/../app');

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php'; 


app\core\Router::dispatch($_SERVER['REQUEST_URI']);
