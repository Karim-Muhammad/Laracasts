<?php
    use \Core as C; // but if we have another class with same name in another namespace, we can use alias
    $config = require_once base_path("Core/config.php");
    $db = new C\Database($config["database"]);

    const CURRENT_USER_ID = 1; // hardcoded now, but later we will use Session, Authentication
    echo $Method;

    if($Method=== "GET") {
        $id = $_GET["id"];
        $note = $db->query("SELECT * FROM notes where id = :id", ["id" => $id])->findOrAbort();
        // we created new mthod to combine fetching and aborting logic in one method

        authorize($note["user_id"] !== CURRENT_USER_ID);

        view("notes/show.view.php", [
            "heading" => "Note",
            "note" => $note,
        ]);
    }
    elseif ($Method === "POST") {
        // create note
        $content = $_POST["note-content"];
        $errors = [];

        if(!C\Validator::string($content)) {
            $errors["string"] = C\Validator::getErrorMessage("string");
        }

        if(count($errors) > 0) {
            $heading = "Create Note";
            view("notes/create.view.php", compact("errors", "heading")); // new way (compact)
            return;
        }

        $db->query("INSERT INTO notes (id, content, user_id) VALUES (NULL, :content, 1)", [
            "content" => htmlspecialchars($content),
        ]);

        header("Location: /notes"); // will go to /notes and execute index.php then execute function routeToController
    }
    elseif ($Method === "DELETE") {
        // delete note
        $id = $_POST["id"];
        $note = $db->query("SELECT * FROM notes where id = :id", ["id" => $id])->findOrAbort();
        authorize($note["user_id"] === CURRENT_USER_ID);
        $db->query("DELETE FROM notes WHERE id = :id", ["id" => $id]);
        header("Location: /notes");
    }
    else {
        dd("Method not allowed");
    }
