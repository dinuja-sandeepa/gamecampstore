<?php

class Database
{
    public static $connection;

    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {

            $envFile = __DIR__ . '/.env';

            if (!file_exists($envFile)) {
                die("Database configuration file not found.");
            }

            $env = parse_ini_file($envFile);

            Database::$connection = new mysqli(
                $env['DB_HOST'],
                $env['DB_USER'],
                $env['DB_PASSWORD'],
                $env['DB_NAME'],
                $env['DB_PORT']
            );

            if (Database::$connection->connect_error) {
                die("Database connection failed.");
            }
        }
    }

    public static function iud($q)
    {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
