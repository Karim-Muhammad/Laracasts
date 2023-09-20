<?php

  if($_SERVER["REQUEST_METHOD"] === "GET") {
    $heading = "Create Note";
    require_once "views/create.view.php";
    return;
  }else if($_SERVER["REQUEST_METHOD"] === "POST") {
    echo $_POST["note-content"];
  }