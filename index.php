<?php

    require_once "helpers/helpers.php";
    
    $routes = require_once "routers/routes.php";

    $current_uri = $_SERVER["REQUEST_URI"];
    $URI = parse_url($current_uri);
    $PATH = $URI["path"];

    


    routeToController($URI['path'], $routes);