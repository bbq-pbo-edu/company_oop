<?php

abstract class AbstractRepository
{
    public function dbConnect(): PDO|null
    {
        $dbHost = $_ENV["DB_HOST"];
        $dbName = $_ENV["DB_NAME"];
        $dbUser = $_ENV["DB_USER"];
        $dbPass = $_ENV["DB_USER_PW"];

        try {
            return new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
        }
        catch (PDOException $e) {
            echo "Connection to database failed.<br>" . $e->getMessage() . "<br>";
            return null;
        }
    }

    public abstract function findAll();
    public abstract function findById(int $id);
    public abstract function create(Employee $employee);
    public abstract function update(Employee $employee);
    public abstract function delete(int $id);
}