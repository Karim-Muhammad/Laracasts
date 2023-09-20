<?php
    require_once "Response.php";
    require_once "Database.php";
    $config = require_once "config.php";
    $db = new Database($config["database"]);

    $id = $_GET["id"];
    $note = $db->query("SELECT * FROM notes where id = :id", ["id" => $id])->findOrAbort();
    // we created new mthod to combine fetching and aborting logic in one method

    $heading = "Note";

    /**
     * Magic Numbers
     * They are numbers that have special meaning that didn't declared in our codebase
     */
    const CURRENT_USER_ID = 1; // hardcoded now, but later we will use Session, Authentication

    //    no longer needed (new added method findOrAbort())
    //    if($note === false) {
    //        abort(404); // Not Found
    //    }

    authorize($note["user_id"] !== CURRENT_USER_ID);

    require "views/note.view.php";