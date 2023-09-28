<?php


    namespace Core;

    class ValidationException extends \Exception {
        public readonly array $errors;
        public readonly array $old;

        public function __construct(array $errors, array $old) {
            $this->errors = $errors;
            $this->old = $old;
        }

        static public function throws(array $errors, array $old) {
            throw new static($errors, $old);
        }
    }