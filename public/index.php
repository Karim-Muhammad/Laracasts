<?php
use Core\ValidationException;
use Core\Session;

session_start();

const ROOT = __DIR__ . "/../";
require_once ROOT . "vendor/autoload.php"; // composer autoload

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

try {
    $router->route($PATH, $Method);
}catch(ValidationException $exception) {
    Session::flash("errors", $exception->errors);
    Session::flash("inputs", $exception->old);

    redirect($router->previousUrl());
}

Session::unflash();


