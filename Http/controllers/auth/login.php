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
$form = LoginForm::validate($_POST);

$signIn = (new Authenticator)->login($email, $password);

if (! $signIn) {
    $form
    ->error("auth-msg", "Email or password is not correct!")
    ->throws();    
}


redirect("/");