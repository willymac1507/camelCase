<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get($uri, $controller): static
    {
        return $this->add('GET', $uri, $controller);
    }

    public function add($method, $uri, $controller): static
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function post($uri, $controller): static
    {
        return $this->add('POST', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path("Http/controllers/{$route['controller']}");
            }
        }
        abort();
    }
}