<?php

    global $router;

    // ============================== Home ==============================
    $router->get("/", "controllers/index.php", routable: true, name: "Home");
    $router->get("/about", "controllers/about.php", routable: true, name: "About");
    $router->get("/contact", "controllers/contact.php", routable: true, name: "Contact");

    // ============================== Notes ==============================
    $router->get("/notes", "controllers/notes/index.php", routable: true, name: "Notes");

    $router->get("/notes/create", "controllers/notes/create.php");
    $router->post("/notes", "controllers/notes/store.php");

    $router->get("/notes/edit", "controllers/notes/edit.php");
    $router->put("/notes", "controllers/notes/update.php");

    $router->delete("/notes", "controllers/notes/destroy.php");

    // ============================== Note ==============================
    $router->get("/note", "controllers/notes/show.php");




    return $router->getRoutes();
