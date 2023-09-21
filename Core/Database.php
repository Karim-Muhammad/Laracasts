<?php

    namespace Core;
    // every function call without namespace quilifer will be default namespace is current namespace
    // so PDO is \Core\PDO , but in our namespace there is no PDO function
    // we need use PDO of PHP, so we need to use `\PDO`
    // so each line has PDO we should replace it with "\PDO"
    // but this solution is not good because of repetitive, so we need to use `use` keyword instead

    use \PDO; // Global Namespace or Root Namespace
    // === use PDO; ===

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