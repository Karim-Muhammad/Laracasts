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

            if(is_array($role)) {
                foreach($role as $r) {
                    static::handle($r);
                }
                return;
            }

//            dd($role);

            if(!array_key_exists($role, static::$MAP)) {
                throw new \Exception("Role is not exist!");
            }

            (new static::$MAP[$role])->handle();
        }
    }