<?php

    namespace Core;
    
    class Response {
        const NOT_FOUND = 404;
        const FORBIDDEN = 403;
        const UNAUTHORIZED = 401;
        const OK = 200;

        public static function abort(?int $code = 404): void {
            http_response_code($code);
            $error_code = $code;
            require_once "views/error_view.php";
            die();
        }
    }