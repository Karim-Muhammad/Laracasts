<?php

    $config = require_once base_path("Core/config.php");
    
    $db = new \Core\Database($config["database"]);

    //$notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $notes = $db->query("SELECT * FROM notes where user_id = 1")->findAllOrAbort();

    view("notes/index.view.php", [
        "heading" => "Notes",
        "notes" => $notes,
    ]);