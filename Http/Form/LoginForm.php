<?php


    namespace Http\Form;
    use Core\Validator;

    class LoginForm extends FormAuth {

        public function validate($email, $password) {
            // Validate Email
            if (\Core\Validator::email($email) === false) {
                $this->errors["email"] = "Email is not valid";
            }

            // Validate Password
            if (! $this->ispassword($password)) {
                $this->errors["password"] = "Password must contains 8-20 chars, at least one special character";
            }

            return empty($this->errors);
        }
    }