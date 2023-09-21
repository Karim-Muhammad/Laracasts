<?php


    // 1#
    //$heading = "Home";
    // view("index.view.php", compact("heading")); // new way (compact)

    // 2#
    view("index.view.php", [
        "heading" => "Home",
    ]);