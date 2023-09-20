<?php

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