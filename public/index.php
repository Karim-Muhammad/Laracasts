<?php

session_start();

const ROOT = __DIR__ . "/../";

require_once ROOT . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("$class.php");
});

// Setup Container Service
require_once base_path("bootstrap.php");

// Setup Routers
$router = new Core\Router();
$routes = require_once base_path("routers/routes.php");

// for nav views
$routes_links = $router->getRoutableLinks();


$Uri = $_SERVER["REQUEST_URI"];
$Method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

// echo $Method;

// also there is naming convention for _method is _csrf (cross site request forgery)

$URI = parse_url($Uri);
$PATH = $URI["path"];

$router->route($PATH, $Method);

$_SESSION["_flash"] = [];
unset($_SESSION["_flash"]);


