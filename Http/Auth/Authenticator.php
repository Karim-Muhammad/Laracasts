<?php

namespace Http\Auth;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator
{

    private $errors = [];

    public function register($email, $password, $username)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email,
        ])->find();

        // dd($user);

        if ($user) {
            $this->errors["auth-msg"] = "This account is already exist!";
            return false;
        }

        $db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", [
            "name" => $username,
            "email" => $email,
            "password" => sha1($password)
        ]);

        return true;
    }

    public function login($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email,
        ])->find();

        if (!$user || sha1($password) !== $user['password']) {
            $this->errors["auth-msg"] = "Email or password is not correct!";
            return false;
        }

        $this->session('user', $user);
        return true;
    }

    public function logout()
    {
        Session::destroy();
    }

    public function session($key, $auth_data)
    {
        $_SESSION[$key] = $auth_data;
        session_regenerate_id();
    }

    public function errors()
    {
        return $this->errors;
    }
}