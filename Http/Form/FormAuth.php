<?php

    namespace Http\Form;

    use Core\ValidationException;
    use Core\Validator;

    class FormAuth {
        protected $errors = [];

        public function __construct(public array $attributes) {
            // Validate Email
            if (Validator::email($attributes["email"]) === false) {
                $this->errors["email"] = "Email is not valid";
            }

            // Validate Password
            if (! $this->ispassword($attributes["password"])) {
                $this->errors["password"] = "Password must contains 8-20 chars, at least one special character";
            }
        }

        public function ispassword($password): bool
        {
            return Validator::string($password, 8, 255) && preg_match("/[^0-9A-Za-z]+/", $password);
        }

        public function errors() {
            return $this->errors;
        }

        public function error($key, $message) {
            $this->errors[$key] = $message;

            return $this;
        }

        public function failed() {
            return count($this->errors);
        }

        public function throws() {
            ValidationException::throws($this->errors, $this->attributes);
        }
    }