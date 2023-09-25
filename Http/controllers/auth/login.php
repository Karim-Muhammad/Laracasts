<?php

    namespace Http\Form;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        view("auth/login.view.php");
        exit();
    }

// cool way
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    // Validate Form Inputs
    $_SESSION["inputs"] = $_POST;
    $form = new LoginForm();

    if(! $form->validate($email, $password)) {
        $_SESSION["errors"] = $form->errors();
        redirect("/login");
    }

    // everything is valid? check if this account is exist or not
    $db = \Core\App::resolve(\Core\Database::class);
    $user = $db->query("SELECT * FROM users WHERE email = :email and password = :password", [
        "email" => $email,
        "password" => sha1($password)
    ])->find();


    if (!$user) {
        $errors["auth-msg"] = "Email or password is not correct!";
        redirect("/login");
    }

    $_SESSION["user"] = $user;

    // each time login user, we regenerate session id to prevent session fixation attack (need explain for this)
    session_regenerate_id();


    redirect("/");