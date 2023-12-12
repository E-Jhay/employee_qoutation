<?php

// Connect to database
class Database {

    private $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        
        // $dsn = "mysql:host={$host};port={$port};dbname={$dbname};user={$user};password={$password};charset={$charset}";
        
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        
        return $statement;
    }
}
