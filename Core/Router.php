<?php

namespace Core;

class Router
{
    private array $routes = [];

    // Add route to routes
    public function add(string $uri, string $controller, string $method): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function route($uri, $method): mixed
    {
        // Check if route exists, if not abort
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return require basePath('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort(404);
    }

    private function abort(int $code): void
    {
        http_response_code($code);
        require basePath('views/partials/$code.php');
        die();
    }
}