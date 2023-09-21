<?php

    const ROOT = __DIR__ . "/../";
    require_once ROOT . "Core/functions.php";

    $routes = require_once base_path("routers/routes.php");

    spl_autoload_register(function ($class) {
        require base_path("$class.php");
    });

    $current_uri = $_SERVER["REQUEST_URI"];
    $URI = parse_url($current_uri);
    $PATH = $URI["path"];

    


    routeToController($URI['path'], $routes);