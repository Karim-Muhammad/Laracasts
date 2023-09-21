<?php

    declare(strict_types = 1);

    function dd($value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";

        die();
    }

    function urlIs(string $value) {
        return $_SERVER["REQUEST_URI"] === $value;
    }

    function routeToController(string $uri, array $routes):void {
        if (array_key_exists($uri, $routes))
            require_once controller($routes[$uri]["controller"]);
        else
            Response::abort(Response::NOT_FOUND);
    }

    function authorize(bool $condition): void {
        if($condition = false)
            Response::abort(Response::UNAUTHORIZED);
    }

    function base_path($path) {
        return ROOT . $path;
    }

    function controller(string $path) {
        // require_once base_path("controllers/$path.php");
        return base_path($path);
    }

    function view(string $path, ?array $data = []):void {
        extract($data);
        require_once base_path("views/$path");
        return;
    }

    function partial(string $path) {
        require_once base_path("views/partials/$path");
        return;
    }