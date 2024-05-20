<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    protected $connection;
    protected $statement;

    public function __construct($servername, $dbname, $username, $password)
    {
        try{
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
        }
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}