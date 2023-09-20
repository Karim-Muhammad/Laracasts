<?php

  require_once "helpers/Validator.php";
  $config = require_once "helpers/config.php";
  require_once "helpers/Database.php";

  if($_SERVER["REQUEST_METHOD"] === "GET") {
    $heading = "Create Note";
    require_once "views/create.view.php";
    return;
  }else if($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = new Database($config["database"]);
    $content = $_POST["note-content"];

    $errors = [];
    // Empty string Case
    if(!Validator::string($content)) {
      $errors["body"] = Validator::getErrorMessage("string");
    }

    if(count($errors) > 0) {
      // header("Location: /notes/create");
      $heading = "Create Note";
      require_once "views/create.view.php";
      return;
    }

    $db->query("INSERT INTO notes (id, content, user_id) VALUES (NULL, :content, 1)", [
      "content" => htmlspecialchars($content),
      // "user_id" => $_POST["user_id"]
    ]);

    header("Location: /notes");
  }

  /**
   * Get method is a item potent, you can call it as many times as you want and it will not change the state of the application
   * Post method is not item potent, you can call it as many times as you want and it will change the state of the application (you insert a new record in database each call)
   * 
   */