<?php

session_start();

const ROOT = __DIR__ . "/../";
require ROOT . "vendor/autoload.php"; // composer autoload

require_once ROOT . "Core/functions.php";

// Setup Container Service
require_once base_path("bootstrap.php");

// Setup Routers
$router = new Core\Router();
$routes = require_once base_path("routes.php");

// for nav views
$routes_links = $router->getRoutableLinks();


$Uri = $_SERVER["REQUEST_URI"];
$Method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

// echo $Method;

// also there is naming convention for _method is _csrf (cross site request forgery)

$URI = parse_url($Uri);
$PATH = $URI["path"];

$router->route($PATH, $Method);

Core\Session::unflash();


