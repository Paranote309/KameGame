<?php

namespace KameGame;

class ItemRepository
{
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();

        if(null == $this->connection){
            die('there was an error connection to the database');
        }
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM item';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'KameGame\\Item');

        $items = $stmt->fetchAll();

        return $items;
    }


}