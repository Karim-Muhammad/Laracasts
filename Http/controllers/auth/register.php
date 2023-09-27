<?php
use Http\Auth\Authenticator;

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

if ($form->validate($username, $email, $password, $confirm_password)) {
    if ((new Authenticator)->register($email, $password, $username)) {
        redirect("/login");
    }

    $form->error("auth-msg", "This account is already exist!");
}

$_SESSION["errors"] = $form->errors();
redirect("/register");