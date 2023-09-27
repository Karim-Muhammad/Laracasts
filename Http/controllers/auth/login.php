<?php

use Http\Form\LoginForm;
use Http\Auth\Authenticator;


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

if ($form->validate($email, $password)) {
    // everything is valid? check if this account is exist or not
    if ((new Authenticator)->login($email, $password)) {
        redirect("/");
    }

    $form->error("auth-msg", "Email or password is not correct!");
}

$_SESSION["errors"] = $form->errors();
redirect("/login");