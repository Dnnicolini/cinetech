<?php

namespace app\core;

class Router {
    private static $routes = [];

    public static function get($uri, $action) {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post($uri, $action) {
        self::$routes['POST'][$uri] = $action;
    }

    public static function dispatch($uri) {
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $action) {
            if (preg_match("#^$route$#", $uri, $matches)) {
                array_shift($matches); 

                $controllerName = $action[0]; 
                $methodName = $action[1]; 

                $controller = new $controllerName(); 
                call_user_func_array([$controller, $methodName], $matches);
                return;
            }
        }

        echo $method . ' ' . $uri;
    }
}

