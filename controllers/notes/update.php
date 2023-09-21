<?php

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        $id = $_GET["id"];
        $config = require_once base_path("Core/config.php");
        $db = new \Core\Database($config["database"]);

        $note = $db->query("SELECT * from notes WHERE id = :id", [
            "id" => $id,
        ])->findOrAbort();

        authorize($note["user_id"] === 1); // current_userid = 1

        view("notes/edit.view.php", [
            "note" => $note,
        ]);

        die();
    }

