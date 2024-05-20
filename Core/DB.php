<?php

namespace Core;

use SQLite3;

class DB
{
    protected static $connection;
    protected static $statement;

    public static function connect(): void
    {
        $servername = '127.0.0.2';
        $dbname = 'anonmail';
        $username = 'root';
        $password = '@21Nov2004';

        try {
            self::$connection = new SQLite3("../database/anonmail.sqlite");
        } catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
        }
    }

    public static function query($query, $params = [])
    {
        if (! self::$connection) {
            self::connect();
        }
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($params);

        return new static;
    }

    public static function fetch()
    {
        return self::$statement->fetch();
    }

    public static function fetchAll()
    {
        return self::$statement->fetchAll();
    }
}