<?php

    class App {

        private static $container;

        public static function setContainer($container) {
            // self::$container = $container;
            static::$container = $container;
        }


        public static function container() {
            return static::$container;
        }
    }