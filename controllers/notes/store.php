<?php

    use \Core\Validator;

    $db = \Core\App::resolve("Core\Database");

    $content = $_POST["note-content"];

    $errors = [];

    if (!Validator::string($content)) {
        $errors["string"] = Validator::getErrorMessage("string");
    }

    if (count($errors) > 0) {
        $heading = "Create Note";
        view("notes/create.view.php", compact("errors", "heading")); // new way (compact)
        return;
    }

    $db->query("INSERT INTO notes (id, content, user_id) VALUES (NULL, :content, 1)", [
        "content" => htmlspecialchars($content),
    ]);

    header("Location: /notes"); // will go to /notes and execute index.php then execute function routeToController
    exit();