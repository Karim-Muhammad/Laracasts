<?php

    namespace Http\Form;

    use Core\Validator;

    class FormAuth {
        protected $errors = [];
        public function ispassword($password): bool
        {
            return Validator::string($password, 8, 255) && preg_match("/[^0-9A-Za-z]+/", $password);
        }
        public function errors() {
            return $this->errors;
        }
        public function error($key, $message) {
            $this->errors[$key] = $message;
        }
    }