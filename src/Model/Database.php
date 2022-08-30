<?php

namespace KameGame;

use Exception;
use PDO;

class Database
{
    const MYSQL_HOST = 'localhost';
    const MYSQL_PORT = '3306';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'Wvfn9337';
    const MYSQL_DATABASE = 'yugiohstore';

    const DATA_SOURCE_NAME = 'mysql:dbname=' . self::MYSQL_DATABASE . ';host=' . self::MYSQL_HOST . ':' . self::MYSQL_PORT;

    private ?\PDO $connection = null;

    public function getConnection(): ?\PDO
    {
        return $this->connection;
    }

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                self::DATA_SOURCE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    private function exceptionMessage(Exception $e): string
    {
        $separator = "\n<pre>\n";
        $message = "--- DB error ---";
        switch ($e->getCode()) {
            case 1045:
                $message .= 'access DENIED to db user (code 1045), check DB username/password';
                break;

            case 2002:
                $message .= 'connection refused (code 2002), check DB host and port';
                break;

            case 1049:
                $message .= 'unknown database (code 1049), database schema name in constant MYSQL_DATABASE = "' . self::MYSQL_DATABASE . '"';
                $message .= $separator . 'suggested solution: create schema with SQL: "CREATE DATABASE ' . self::MYSQL_DATABASE . '"';
                break;

            default:
                // just return message in the Exception ...
                $message .= $e->getMessage();
        }

        $separator = "\n<pre>\n";
        return $message . $separator;
    }

    public function getAll(string $tablename): bool|array
    {
        $sql = 'SELECT * FROM ' . $tablename;


        $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'KameGame\\' . $tablename);
            return $stmt->fetchAll();
    }

    public function getOne(string $tablename, string $column, string $value)
    {
       $sql = 'SELECT * FROM ' .$tablename. ' WHERE ' .$column. ' LIKE  "'. $value .'"';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'KameGame\\'. $tablename);
        return $stmt->fetch();
    }

    public function addOne(string $tablename, array $values)
    {


        $sql = sprintf( "INSERT INTO %s (%s) values (%s)", $tablename, implode(", ", array_keys($values)), ":" . implode(", :", array_keys($values))
        );
        $stmt =$this->connection->prepare($sql);
        $stmt->execute($values);

    }
}