<?php

    $db = \Core\App::resolve("Core\Database");

    // $notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $user_id = $_SESSION["user"]["id"] ?? 1; // ?? 1 not to break the app if the user is not logged in (test)

    $notes = $db->query("SELECT * FROM notes where user_id = :user_id", [
        "user_id" => $user_id,
    ])->findAll();

    view("notes/index.view.php", [
        "heading" => "Notes",
        "notes" => $notes,
    ]);


    /**
     * POST, PUT, DELETE, are not item potent, means that if you call them multiple times, they will change the state of the application
     * so you canont use anchor tag to call them, you have to use form tag or ajax
     */

    exit();