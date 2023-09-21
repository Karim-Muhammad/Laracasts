<?php

    class Database
    {
        public $connection;
        public $statement;

        public function __construct($config, $username = "root", $password = "")
        {
            $dsn = "mysql:".http_build_query($config, arg_separator: ";");

            $this->connection = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        public function query(string $query, ?array $params = [])
        {
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($params);

            return $this;
        }
        public function find() {
            return $this->statement->fetch();
        }
        public function findAll() {
            return $this->statement->fetchAll();
        }
        public function findOrAbort() {
            $results = $this->statement->fetch();
            if($results === false) {
                Response::abort(Response::NOT_FOUND);
            }

            return $results;
        }
        public function findAllOrAbort() {
            $results = $this->statement->fetchAll();
            if(count($results) === 0) {
                Response::abort(Response::NOT_FOUND);
            }

            return $results;
        }

        public function sql() {
            return $this->statement->execute();
        }
    }