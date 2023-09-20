<?php
    require_once "routers/router.php";

    // Connection Database
    /*$config = [
        "host" => "localhost",
        "port" => 3306,
        "user" => "root",
        "dbname" => "myblog",
        "charset" => "utf8mb4"
    ];  // hard-coded still! move upward */
//    die();
//    //header("Location: controllers/index.php");
//    // =================================== //
//    $config = require("config.php");
//    $db = new Database($config["database"]);
//    $id = $_GET["id"];
//    $query = "SELECT * FROM notes where id = ?"; // SQL Injection Vulnrability ثغرة
//    $blogs = $db->query($query, [$id])->fetchAll(); // safer mode
//    dd($blogs);