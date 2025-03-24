<?php
class Router {
    private static $routes = [];

    // Adiciona uma rota GET
    public static function get($uri, $action) {
        self::$routes['GET'][$uri] = $action;
    }

    // Adiciona uma rota POST
    public static function post($uri, $action) {
        self::$routes['POST'][$uri] = $action;
    }

    // Dispara a ação correta com base na URI
    public static function dispatch($uri) {
        $method = $_SERVER['REQUEST_METHOD'];

        // Verifica se a rota existe para o método e a URI
        foreach (self::$routes[$method] as $route => $action) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                array_shift($matches); // Remove a URI completa da correspondência

                // Instancia o controlador e chama o método
                $controllerName = $action[0]; // O nome da classe (ex: FilmeController)
                $methodName = $action[1]; // O nome do método (ex: index)

                $controller = new $controllerName(); // Cria a instância do controlador
                call_user_func_array([$controller, $methodName], $matches); // Chama o método da instância
                return;
            }
        }

        // Se a rota não for encontrada
        echo "Página não encontrada.";
    }
}

