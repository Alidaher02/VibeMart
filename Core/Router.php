<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null

        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function only($key){

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        dd($this->routes);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                $controllerPath = base_path($route['controller']);
                if ($route['middleware'] === 'guest') {
                    if ($_SESSION['user'] ?? false) {
                        header('location: /ReadIt/public/');
                        exit();
                    }
                }

                if ($route['middleware'] === 'auth') {
                    if (!$_SESSION['user'] ?? false) {
                        header('location: /ReadIt/public/');
                        exit();
                    }
                }
                if (file_exists($controllerPath)) {
                    require $controllerPath;
                    exit;
                }
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

   
}