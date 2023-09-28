<?php

    namespace Http\Form;
    use Core\ValidationException;
    use Core\Validator;

    class RegisterForm extends FormAuth {

        public function __construct(public array $attributes) {
            parent::__construct($attributes);
        }

        static public function validate($attributes) {
            
            $register = new static($attributes);

            // Validate Username
            if(Validator::string($attributes['username'], 3, 20) === false) {
                $register->errors["username"] = "Username must be between 3 and 20 characters";
            }

            
            // Validate Confirm Password
            if ($attributes['password'] !== $attributes['confirm_password']) {
                $register->errors["confirm_password"] = "Confirm password is not match";
            }

            return $register->failed() ? $register->throws() : $register;
        }
    }