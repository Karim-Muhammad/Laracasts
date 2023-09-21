<?php

  // dd($_POST);

  $config = require_once base_path("Core/config.php");
  $db = new \Core\Database($config["database"]);

  $note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST["id"],
  ])->findOrAbort();
  // if(authorize($note["user_id"] === $_SESSION["user_id"]))
  authorize($note["user_id"] === 1);

  $db->query("DELETE FROM notes WHERE id = :id", [
    "id" => $_POST["id"],
  ]);


  header("Location: /notes");
  exit(); // or use `die()`;
