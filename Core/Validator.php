<?php

  namespace Core;

  class Validator {

    // Pure function not depend on any state, we translate it in OOP to `static` method
    static $error_messages = [];
    static public function string(string $value, ?int $min = 1, ?int $max = 1000):bool {
      $value = trim($value);

      if(empty($value)) {
        self::$error_messages["string"] = "content is required (cannot be empty)";
        return false;
      }

      if(strlen($value) >= $max) {
        self::$error_messages["string"] = "content must be less than $max characters";
        return false;
      }

      return true;
    }
    static public function email($email) {
        $result = filter_var($email, FILTER_VALIDATE_EMAIL);

        if($result === false) {
            self::$error_messages["email"] = "email is not valid";
            return false;
        }

        return $result;
    }
    static public function password($password, $min = 8, $max = INF) {
        return strlen($password) >= $min && strlen($password) <= $max;
    }

    static public function custom($value, $callback) {
        return $callback($value);
    }

    static public function getErrorMessage(?string $key):array|string {

      if(func_num_args() === 0) {
        return self::$error_messages;
      }

      return self::$error_messages[$key] ?? "Key is not exist!";
    }
  }