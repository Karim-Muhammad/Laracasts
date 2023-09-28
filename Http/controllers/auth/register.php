<?php
use Http\Auth\Authenticator;
use Http\Form\RegisterForm;
use Core\Session;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    return view("auth/register.view.php", [
        "heading" => "Register",
        "errors" => Session::get("errors") ?? [],
        "inputs" => Session::get("inputs") ?? [],
    ]);
}

// cool way
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$form = RegisterForm::validate($_POST);

$register = (new Authenticator)->register(...[
    "username" => $username,
    "email" => $email,
    "password" => $password,
]);

if (! $register) {
    $form
    ->error("auth-msg", "This account is already exist!")
    ->throws();
}

redirect("/");