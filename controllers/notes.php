<?php
    require_once "helpers/Response.php";
    require_once "helpers/Database.php"; //(required in index.php)
    $config = require_once "helpers/config.php";
    $db = new Database($config["database"]);

    //$notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $notes = $db->query("SELECT * FROM notes where user_id = 1")->findAllOrAbort();

    $heading = "Notes";

    require "views/notes.view.php";