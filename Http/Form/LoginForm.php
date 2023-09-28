<?php


    namespace Http\Form;
    use Core\Validator;

    class LoginForm extends FormAuth {

        public function __construct(public array $attributes) {
            parent::__construct($attributes);
        }

        static public function validate($attributes) {
            $instance = new static($attributes);

            return $instance->failed() ? $instance->throws() : $instance;
        }
    }