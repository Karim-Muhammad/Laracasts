<?php

    $router->get("/", "controllers/index.php", routable: true, name: "Home");
    $router->get("/about", "controllers/about.php", routable: true, name: "About");
    $router->get("/contact", "controllers/contact.php", routable: true, name: "Contact");
    $router->get("/notes", "controllers/notes/index.php", routable: true, name: "Notes");
    $router->get("/note", "controllers/notes/show.php");

    $router->get("/notes/create", "controllers/notes/create.php");
    $router->post("/notes/create", "controllers/notes/create.php");

    $router->delete("/notes/delete", "controllers/notes/destroy.php");

    $router->get("/notes/edit", "controllers/notes/update.php");
    $router->put("/notes/edit", "controllers/notes/update.php");

    return $router->getRoutes();


    /*
    return [
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
            "controller" => "controllers/notes/index.php",
        ], // put ! before the route to make it private
        "/note" => [
            "name" => "!Note",
            "controller" => "controllers/notes/show.php"
        ],
        "/notes/create" => [
            "name" => "!Create Note",
            "controller" => "controllers/notes/create.php"
        ],
        "/notes/delete" => [
            "name" => "!Delete Note",
            "controller" => "controllers/notes/destroy.php"
        ],
    ];
    */