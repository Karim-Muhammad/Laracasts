<?php

    namespace Core\Middlewares;

    class Auth
    {
        public function handle() {
            if(!$_SESSION["user"] ?? false) {
                http_response_code(403);
                redirect("/login");
            }
        }
    }