<?php

    use Core\App;

     $db = App::resolve(\Core\Database::class); // Equivalent to the below line
    // $db = App::resolve("Core\Database"); // Equivalent to the above line

    $note = $db->query("SELECT * FROM notes WHERE id = :id", [
        "id" => $_POST["id"],
    ])->findOrAbort();

    authorize($note["user_id"] === 1);

    $db->query("DELETE FROM notes WHERE id = :id", [
        "id" => $_POST["id"],
    ]);


    header("Location: /notes");
    exit();
