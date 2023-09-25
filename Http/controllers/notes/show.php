<?php

    $db = \Core\App::resolve("Core\Database");


    $id = $_GET["id"];
    $note = $db->query("SELECT * FROM notes where id = :id", ["id" => $id])->findOrAbort();
    // we created new mthod to combine fetching and aborting logic in one method
    

    /**
     * Magic Numbers
     * They are numbers that have special meaning that didn't declared in our codebase
     */
    $CURRENT_USER_ID = $_SESSION["user"]['id'] ?? null; // hardcoded now, but later we will use Session, Authentication

    if(!$CURRENT_USER_ID) {
        (new \Core\Middlewares\Guest)->handle();
    }

    authorize($note["user_id"] !== $CURRENT_USER_ID);

    view("notes/show.view.php", [
        "heading" => "Note",
        "note" => $note,
    ]);

    exit();