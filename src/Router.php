<?php

namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method, $data = '')
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action, 'data' => $data];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action, $data)
    {
        $this->addRoute($route, $controller, $action, "POST", $data);
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];
        $data = $_REQUEST;

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];


            $controller = new $controller();
            $controller->$action($data);
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
}
