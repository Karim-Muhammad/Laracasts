<?php
    $config = require_once base_path("Core/config.php");
    $db = new \Core\Database($config["database"]);

    $id = $_POST["id"]; // Weird, right? see file show.view.php

    $note = $db->query("SELECT * from notes WHERE id = :id", [
        "id" => $id,
    ])->findOrAbort();

    authorize($note["user_id"] === 1); // current_userid = 1

    view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "note" => $note,
    ]);

    exit();

