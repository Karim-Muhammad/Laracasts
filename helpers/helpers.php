<?php

    function dd($value) {
        echo "<pre>";
        print_r($value);
        echo "</pre>";

        die();
    }

    function urlIs($value) {
        return $_SERVER["REQUEST_URI"] === $value;
    }

    function routeToController($uri, $routes):void {
        if (array_key_exists($uri, $routes))
            require_once $routes[$uri]["controller"];
        else
            Response::abort(Response::NOT_FOUND);
    }

    function authorize(bool $condition): void {
        if($condition = false)
            Response::abort(Response::UNAUTHORIZED);
    }