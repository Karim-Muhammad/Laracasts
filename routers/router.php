<?php

    require_once "helpers.php";
    require_once "Database.php";

    $current_uri = $_SERVER["REQUEST_URI"];
    $URI = parse_url($current_uri);
    $PATH = $URI["path"];
    //dd($PATH);



// refactor 0
/*
    if($URI['path'] === "/")
        require_once "controllers/index.php";
    elseif ($URI['path'] === "/about")
        require_once "controllers/about.php";
    elseif ($URI['path'] === "/contact")
        require_once "controllers/contact.php";
    else
//        require_once "views/error_view.php";
*/


    // refactor 1
    $routes = [
        "/" => [
            "name" => "Home",
            "controller" => "controllers/index.php",
        ],
        "/about" => [
            "name" => "About",
            "controller" => "controllers/about.php",
        ],
        "/contact" => [
            "name" => "Contact",
            "controller" => "controllers/contact.php",
        ],
        "/notes" => [
            "name" => "Notes",
            "controller" => "controllers/notes.php",
        ], // put ! before the route to make it private
        "/note" => [
            "name" => "!Note",
            "controller" => "controllers/note.php"
        ],
        "/notes/create" => [
            "name" => "!Create Note",
            "controller" => "controllers/create.php"
        ]
    ];


    routeToController($URI['path'], $routes);