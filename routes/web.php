<?php

use app\controllers\GeneroController;
use app\controllers\FilmeController;
use app\core\Router;


$router = new Router();

$router->get('/filmes', [FilmeController::class, 'index']);
$router->get('/filmes/create', [FilmeController::class, 'create']);
$router->post('/filmes/store', [FilmeController::class, 'store']);
$router->get('/filmes/show/(\d+)', [FilmeController::class, 'show']);
$router->get('/filmes/edit/(\d+)', [FilmeController::class, 'edit']);
$router->post('/filmes/update/(\d+)', [FilmeController::class, 'update']);
$router->get('/filmes/destroy/(\d+)', [FilmeController::class, 'destroy']);


$router->get('/generos', [GeneroController::class, 'index']);
$router->get('/generos/create', [GeneroController::class, 'create']);
$router->post('/generos/store', [GeneroController::class, 'store']);
$router->get('/generos/show/(\d+)', [GeneroController::class, 'show']);
$router->get('/generos/edit/(\d+)', [GeneroController::class, 'edit']);
$router->post('/generos/update/(\d+)', [GeneroController::class, 'update']);
$router->get('/generos/destroy/(\d+)', [GeneroController::class, 'destroy']);
