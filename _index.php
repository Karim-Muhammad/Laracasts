<?php


    require_once $_SERVER["DOCUMENT_ROOT"] . "/helpers.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/Database.php";
    // require_once "routers/router.php";

    // Connection Database
    /*$config = [
        "host" => "localhost",
        "port" => 3306,
        "user" => "root",
        "dbname" => "myblog",
        "charset" => "utf8mb4"
    ];  // hard-coded still! move upward */

    $config = require("config.php");

    $db = new Database($config["database"]);

    $id = $_GET["id"];
    $query = "SELECT * FROM blog where id = {$id}"; // SQL Injection Vulnrability ثغرة
    // here you accept every thing user write in URL and execute it as QUERY!!
    // and may user write id = 1; drop table blog !!!
    // or id = 1 or 1 will get all users in database !!!

    // we have to sanitize/purify what users writes in url

    // There are 2 approaches you can take, bind, parameters
    // parameters ? => "SELECT * FROM blog where id = ?"
    // options [$id] that's it

    $query = "SELECT * FROM blog where id = ?";
    $blogs = $db->query($query, [$id])->fetchAll(); // now we not need PDO::FETCH_ASSOC because we did in Database


    // bind :id => "SELECT * FROM blog where id = :id"
    // options ["id" or ":id" optional => $id]

    $query = "SELECT * FROM blog where id = :id";
    $blogs = $db->query($query, ["id" => $id])->fetchAll(); // now we not need PDO::FETCH_ASSOC because we did in Database

    dd($blogs);