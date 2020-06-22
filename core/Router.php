<?php

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if(array_key_exists($uri, $this->routes[$requestType])){
            $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }else{
            throw new Exception("No routes defined for this URI");
        }
    }

    public function callAction($controller, $action)
    {
        $controller = new $controller;

        if(!method_exists($controller, $action)){
            throw new Exception("{$controller} does not have {$action} action defined");
        }

        return $controller->$action();
    }
}