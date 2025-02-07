<?php

namespace Core;

use Core\Middleware\Middleware;

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

    public function post(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function patch($uri, $controller): Router
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function delete(string $uri, string $controller): Router
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function route(string $uri, string $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require basePath('Http/controllers/' . $route['controller']);
            }
        }
        $this->abort(404);
    }

    public function only(array|string $keys): static
    {
        $keys = (array) $keys;

        $this->routes[array_key_last($this->routes)]['middleware'] = $keys;

        return $this;
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    private function abort(int $code): void
    {
        http_response_code($code);
        require basePath("views/partials/{$code}.php");
        die();
    }
}