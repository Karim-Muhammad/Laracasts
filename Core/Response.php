<?php

    namespace Core;
    
    class Response {
        const NOT_FOUND = 404;
        const FORBIDDEN = 403;
        const UNAUTHORIZED = 401;
        const OK = 200;

        public static function abort(?int $code = 404): void {
            http_response_code($code);

            view("error_view.php", [
                "heading" => "Error $code",
                "error_code" => $code,
            ]);

            die();
        }
    }