<?php

  class Validator {

    static $error_message = "";
    static public function isstring(string $value, ?int $min = 1, ?int $max = 1000):bool {
      $value = trim($value);

      if(empty($value)) {
        self::$error_message = "content is required (cannot be empty)";
        return false;
      }

      if(strlen($value) >= $max) {
        self::$error_message = "content must be less than $max characters";
        return false;
      }

      return true;
    }
    static public function getErrorMessage():string {
      return self::$error_message;
    }
  }