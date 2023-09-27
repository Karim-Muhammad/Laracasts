<?php

namespace Core;

class Router
{
    protected $routes = [];
    protected $routable_links = [];

    private function routable($route, string|null $routable): void
    {
        if ($routable) {
            if (!$route["name"])
                dd("Route name is required for routable routes");
            $this->routable_links[$route["uri"]] = $route["name"];
        }
    }
    private function add($method, $uri, $controller, ?string $name = null): array
    {
        $route = [
            "method" => $method,
            "uri" => $uri,
            "controller" => "Http/controllers/$controller",
            "name" => $name,
        ];

        $this->routes[] = $route;

        return $route;
    }
    public function name(&$route, $name): void
    {
        $route["name"] = $name;
    }
    public function get($uri, $controller, ?string $name = null, ?bool $routable = null)
    {
        $route = $this->add("GET", $uri, $controller, $name);
        $this->routable($route, $routable);
        return $this;
    }
    public function post($uri, $controller, ?string $name = null, ?bool $routable = null)
    {
        $this->add("POST", $uri, $controller, $name);
        return $this;
    }
    public function delete($uri, $controller, ?string $name = null, ?bool $routable = null)
    {
        $this->add("DELETE", $uri, $controller, $name);
        return $this;
    }
    public function put($uri, $controller, ?string $name = null, ?bool $routable = null)
    {
        $this->add("PUT", $uri, $controller, $name);
        return $this;
    }
    public function patch($uri, $controller, ?string $name = null, ?bool $routable = null)
    {
        $this->add("PATCH", $uri, $controller, $name);
        return $this;
    }

    /** Add role to the route, to be authorized
     * @param $role
     * @return void
     */
    public function only($role) {
        $this->routes[array_key_last($this->routes)]["role"] = $role;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
    public function getRoutableLinks(): array
    {
        return $this->routable_links;
    }

    private function findRoute(string $path, string $method): array
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $path && $route["method"] === $method) {
                \Core\Middlewares\Authorization::handle($route["role"] ?? null);
                return $route;
            }
        }
        return [];
    }
    public function route(string $path, string $method): void
    {
        $route = $this->findRoute($path, $method);

        if (!$route)
            Response::abort(Response::NOT_FOUND);

        $Method = $method;
        require_once base_path($route["controller"]);
    }
}