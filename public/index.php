<?php

define('APP_DIR', __DIR__ . '/../app');

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../routes/web.php'; 


app\core\Router::dispatch($_SERVER['REQUEST_URI']);
