<?php

    namespace Core\Middlewares;
    use Core\Session;


    class Guest
    {
        public function handle() {
            if(Session::get("user") ?? false) {
                redirect("/");
            }
        }
    }