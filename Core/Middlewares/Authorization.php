<?php

    namespace Core\Middlewares;

    class Authorization
    {
        protected static $MAP = [
            "guest" => Guest::class,
            "auth" => Auth::class,
        ];

        public static function handle($role) {
            if(!$role) return;
            if(!array_key_exists($role, static::$MAP)) {
                throw new \Exception("Role is not exist!");
            }

            (new static::$MAP[$role])->handle();
        }
    }