<?php

    namespace Core\Middlewares;
    use Core\Session;

    class Auth
    {
        public function handle() {
            if(! Session::get("user") ?? false) {
                http_response_code(403);
                redirect("/login");
            }
        }
    }