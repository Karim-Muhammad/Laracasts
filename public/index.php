<?php

    const ROOT = __DIR__ . "/../";
    require_once ROOT . "Core/functions.php";
//    dd($_SERVER);


    //$routes = require_once base_path("routers/routes.php");
    spl_autoload_register(function ($class) {
        require base_path("$class.php");
    });

    $router = new Core\Router();
    $routes = require_once base_path("routers/routes.php");
    // for nav views
    $routes_links = $router->getRoutableLinks();


    $Uri = $_SERVER["REQUEST_URI"];
    $Method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

//    echo $Method;

    // also there is naming convention for _method is _csrf (cross site request forgery)

    $URI = parse_url($Uri);
    $PATH = $URI["path"];

    // routeToController($URI['path'], $routes);
    $router->route($PATH, $Method);