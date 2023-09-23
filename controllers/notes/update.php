<?php

use Core\Validator;

$db = \Core\App::resolve("Core\Database");

$id = $_POST["id"];
$content = $_POST["note-content"];

$note = $db->query("SELECT * from notes WHERE id = :id", [
    "id" => $id,
])->findOrAbort();

authorize($note["user_id"] === 1); // current_userid = 1

// Check length of content
if (Validator::string($content)) {
    //$_SESSION["errors"]["content"] = "Content must be at least 5 characters long";
    //header("Location: /note?id=$id");
    view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "note" => $note,
        "errors" => [
            "string" => Validator::getErrorMessage("string"),
        ],
    ]);
    exit();
}

$db->query("UPDATE notes SET content = :content WHERE id = :id", [
    "id" => $id,
    "content" => purify($content),
]);

header("Location: /notes");
exit();