<?php
    require_once "Response.php";
    require_once "Database.php";
    $config = require_once "config.php";
    $db = new Database($config["database"]);

    //$notes = $db->query("SELECT * FROM notes where user_id = 3")->findAll();
    $notes = $db->query("SELECT * FROM notes where user_id = 1")->findAllOrAbort();

    $heading = "Notes";

    require "views/notes.view.php";