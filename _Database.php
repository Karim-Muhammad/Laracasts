<?php

    class _Database
    {
        public $connection;

        public function __construct($config, $username = "root", $password = "")
        {
            // 1# config
            // remeber when we wanted parse url to get query part? parse_url()
            // here we want the opposite we have key_pairs and want build a query stement
            // advice - tip, whenever you have the situation where data should be dynamic depend on environment
            // you have to push(move) this data so up

            // dd(http_build_query($config, arg_separator: ";")); // default is & not ;
            $dsn = "mysql:".http_build_query($config, arg_separator: ";");

            // 2# config
            // put everything here hardcoded is wrong!
            // when we deploy this, our host no longer localhost, but another host has different IP
            // so solution is Environment config

            // $dsn = "mysql:host=localhost;port=3306;user=root;dbname=myblog"; // best practise to determine charset!


            $this->connection = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); // dsn consider it as connection name (like what port, host, protocol, database, charset, ...);
        }

        public function query(string $query, ?array $params = [])
        {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        }
    }