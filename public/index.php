<?php

// Definindo os diretórios de cada componente
define('APP_DIR', __DIR__ . '/../app');


require_once __DIR__ . '/../routes/web.php'; // Arquivo de rotas

// Chama o roteador para processar a requisição
Router::dispatch($_SERVER['REQUEST_URI']);
