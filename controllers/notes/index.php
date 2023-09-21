<?php
    // Now i used spl_autoload_register in public/index.php
    // require_once base_path("helpers/Response.php");
    // require_once base_path("helpers/Database.php"); //(required in index.php)
    $config = require_once base_path("helpers/config.php");
    
    $db = new Database($config["database"]);

    //$notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $notes = $db->query("SELECT * FROM notes where user_id = 1")->findAllOrAbort();

    view("notes/index.view.php", [
        "heading" => "Notes",
        "notes" => $notes,
    ]);