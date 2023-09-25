<?php

    global $router;

// ============================== Home ==============================
    $router->get("/", "index.php", routable: true, name: "Home")->only("auth");
    $router->get("/about", "about.php", routable: true, name: "About"); // you can add array instead of one value, Awesome!
    $router->get("/contact", "contact.php", routable: true, name: "Contact");

// ============================== Notes ==============================
    $router->get("/notes", "notes/index.php", routable: true, name: "Notes")->only("auth");

    $router->get("/notes/create", "notes/create.php")->only("auth");
    $router->post("/notes", "notes/store.php")->only("auth");

// ============================== Note ==============================
    $router->get("/note", "notes/show.php")->only("auth");

    $router->get("/note/edit", "notes/edit.php")->only("auth");
    $router->patch("/note", "notes/update.php")->only("auth");

    $router->delete("/note", "notes/destroy.php")->only("auth");

// =============================== Auth ===============================
    $user = $_SESSION["user"] ?? null; // user exist? so true, else false
    $router->get("/login", "auth/login.php")->only("guest");
    $router->post("/login", "auth/login.php")->only("guest");

    $router->get("/register", "auth/register.php")->only("guest");
    $router->post("/register", "auth/register.php")->only("guest");

    $router->get("/logout", "auth/logout.php")->only("auth");

// ============================== Users ==============================
    $router->get("/profile", "user/profile.php")->only("auth");

    $router->get("/profile/edit", "user/edit.php")->only("auth");
    $router->put("/profile/update", "user/update.php")->only("auth");

    return $router->getRoutes();