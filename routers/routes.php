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

// ============================== Note ==============================
    $router->get("/note", "controllers/notes/show.php");

    $router->get("/note/edit", "controllers/notes/edit.php");
    $router->patch("/note", "controllers/notes/update.php");

    $router->delete("/note", "controllers/notes/destroy.php");

// =============================== Auth ===============================
    $user = $_SESSION["user"] ?? null; // user exist? so true, else false
    $router->get("/login", "controllers/auth/login.php", routable: !$user, name: "Login");
    $router->post("/login", "controllers/auth/login.php");

    $router->get("/register", "controllers/auth/register.php", routable: !$user, name: "Register");
    $router->post("/register", "controllers/auth/register.php");

    $router->get("/logout", "controllers/auth/logout.php", routable: !!$user, name: "Logout");

// ============================== Users ==============================
    $router->get("/profile", "controllers/user/profile.php", routable: !!$user, name: "Profile");


    return $router->getRoutes();