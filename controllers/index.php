<?php

    if($_SESSION["user"]) {
        view("index.view.php", [
            "heading" => "Home",
        ]);
        exit();
    }

    redirect("/login");
