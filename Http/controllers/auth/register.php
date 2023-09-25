<?php

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        view("auth/register.view.php", [
            "heading" => "Register"
        ]);
        exit();
    }

    // cool way
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    $_SESSION["inputs"] = $_POST;
    $form = new Http\Form\RegisterForm();

    if (! $form->validate($username, $email, $password, $confirm_password)) {
        $_SESSION["errors"] = $form->errors();
        redirect("/register");
    }


    // everything is valid? check if this account is exist or not
    $db = \Core\App::resolve(\Core\Database::class);

    $user = $db->query("SELECT * FROM users WHERE email = :email", [
        "email" => $email,
    ])->find();

    if ($user) {
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