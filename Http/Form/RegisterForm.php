<?php

    namespace Http\Form;
    use Core\Validator;

    class RegisterForm extends FormAuth {
        public function validate($username, $email, $password, $confirm_password) {
            // Validate Username
            if(Validator::string($username, 3, 20) === false) {
                $this->errors["username"] = "Username must be between 3 and 20 characters";
            }

            // Validate Email
            if (Validator::email($email) === false) {
                $this->errors["email"] = "Email is not valid";
            }

            // Validate Password
            // study this below line
            // if (! Validator::custom($password, $this->ispassword)) {
            if (! $this->ispassword($password)) {
                $this->errors["password"] = "Password must contains 8-20 chars, at least one special character";
            }

            // Validate Confirm Password
            if ($password !== $confirm_password) {
                $this->errors["confirm_password"] = "Confirm password is not match";
            }

            return empty($this->errors);
        }
    }