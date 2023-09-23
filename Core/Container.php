<?php
    namespace Core;

    class Container
    {
        private $services = [];

        public function bind($service_name, $resolver) {
            // check if service already exists
            if(array_key_exists($service_name, $this->services)) {
                throw new \Exception("Service already exists");
            }

            $this->services[$service_name] = $resolver;
        }

        public function resolve($service_name) {
            // check if service exists or not
            if(!array_key_exists($service_name, $this->services)) {
                throw new \Exception("Service does not exist");
            }

            return call_user_func($this->services[$service_name]);
        }

    }