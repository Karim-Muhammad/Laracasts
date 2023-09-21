<?php

  require_once base_path("helpers/Validator.php");
  require_once base_path("helpers/Database.php");
  $config = require_once base_path("helpers/config.php");

  if($_SERVER["REQUEST_METHOD"] === "GET") {
    $heading = "Create Note";
    require_once view("notes/create");
    return;
  }
  
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = new Database($config["database"]);
    $content = $_POST["note-content"];

    $errors = [];

    if(!Validator::string($content)) {
      $errors["string"] = Validator::getErrorMessage("string");
    }

    if(count($errors) > 0) {
      dd("There are errors");
      $errors = [];
      $heading = "Create Note";
      require_once view("notes/create");
      return;
    }

    $db->query("INSERT INTO notes (id, content, user_id) VALUES (NULL, :content, 1)", [
      "content" => htmlspecialchars($content),
    ]);

    
    // dd("Location: ".view("notes/index"));
    // header("Location: ".view("notes/index")); // will go to /notes and execute index.php then execute function routeToController
    header("Location: /notes"); // will go to /notes and execute index.php then execute function routeToController
  }

  /**
   * Get method is a item potent, you can call it as many times as you want and it will not change the state of the application
   * Post method is not item potent, you can call it as many times as you want and it will change the state of the application (you insert a new record in database each call)
   * 
   */