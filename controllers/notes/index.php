<?php
    use \Core\Container;
    $c = new Container();
    dd($c->resolve("Core\Database"));

    // $config = require_once base_path("Core/config.php");
    // $db = new \Core\Database($config["database"]);

    // $notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $notes = $db->query("SELECT * FROM notes where user_id = 1")->findAllOrAbort();

    view("notes/index.view.php", [
        "heading" => "Notes",
        "notes" => $notes,
    ]);


    /**
     * POST, PUT, DELETE, are not item potent, means that if you call them multiple times, they will change the state of the application
     * so you canont use anchor tag to call them, you have to use form tag or ajax
     */

    exit();