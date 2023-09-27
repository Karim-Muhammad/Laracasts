<?php
use Http\Auth\Authenticator;
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

Session::flash("inputs", $_POST);

$form = new Http\Form\RegisterForm();

if ($form->validate($username, $email, $password, $confirm_password)) {
    if ((new Authenticator)->register($email, $password, $username)) {
        redirect("/login");
    }

    $form->error("auth-msg", "This account is already exist!");
}

Session::flash("errors", $form->errors());

redirect("/register");