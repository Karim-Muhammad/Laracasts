<?php

use Http\Form\LoginForm;
use Http\Auth\Authenticator;

use Core\Session;


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    return view("auth/login.view.php", [
        "title" => "Login",
        "errors" => Session::get("errors") ?? [],
        "inputs" => Session::get("inputs") ?? [],
    ]);

    // exit(); // prevented my root(index.php) from continuing
}

// cool way
foreach ($_POST as $key => $value) {
    $$key = $value;
}

// Validate Form Inputs
Session::flash("inputs", $_POST);

$form = new LoginForm();

if ($form->validate($email, $password)) {
    // everything is valid? check if this account is exist or not
    if ((new Authenticator)->login($email, $password)) {
        redirect("/");
    }

    $form->error("auth-msg", "Email or password is not correct!");
}

Session::flash("errors", $form->errors());

redirect("/login");