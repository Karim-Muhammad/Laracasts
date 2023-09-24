<?php

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        view("auth/login.view.php");
        exit();
    }

// cool way
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

// Validate Form Inputs
    $errors = [];
    $_SESSION["errors"] = &$errors;
    $_SESSION["inputs"] = $_POST;

    if (\Core\Validator::email($email) === false) {
        $errors["email"] = "Email is not valid";
    }

    // Validate Password
    function ispassword($password)
    {
        return \Core\Validator::string($password, 8, 20) && preg_match("/[^0-9A-Za-z]+/", $password);
    }

    if (!\Core\Validator::custom($password, "ispassword")) {
        $errors["password"] = "Password must contains 8-20 chars, at least one special character";
    }

    if (!empty($errors)) {
        redirect("/login");
    }

    // everything is valid? check if this account is exist or not
    $db = \Core\App::resolve(\Core\Database::class);
    $user = $db->query("SELECT * FROM users WHERE email = :email and password = :password", [
        "email" => $email,
        "password" => sha1($password)
//        "password" => password_hash($password, PASSWORD_DEFAULT)
    ])->find();


    if (!$user) {
        $errors["auth-msg"] = "Email or password is not correct!";
        redirect("/login");
    }

    $_SESSION["user"] = $user;
    redirect("/");