<?php

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        view("auth/register.view.php", [
            "heading" => "Register"
        ]);
        exit();
    }


//$username = $_POST["username"];
//$email = $_POST["email"];
//$password = $_POST["password"];

// cool way
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }


// Validate Form Inputs
    $errors = [];
    $_SESSION["errors"] = &$errors;
    $_SESSION["inputs"] = $_POST;

// Validate Username
    if (\Core\Validator::string($username, 3, 20) === false) {
        $errors["username"] = "Username must be between 3 and 20 characters";
    }

// Validate Email
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

    if(!empty($errors)) {
        redirect("/register");
    }

    // everything is valid? check if this account is exist or not
    $db = \Core\App::resolve(\Core\Database::class);

    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        "email" => $email,
    ])->find();

    if($user) {
        $errors["auth-msg"] = "This account is already exist!";
        redirect("/register");
    }

    // everything is valid? and no account with this email? create new account
    $db->query("INSERT INTO users (name, email, password) VALUES (:username, :email, :password)", [
        "username" => $username,
        "email" => $email,
        "password" => sha1($password),
    ]);

    // redirect to login page
    redirect("/login");