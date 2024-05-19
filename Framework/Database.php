<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database
{
    public $conn;

    /**
     * Constructor for Database class
     * @param array $config
     */

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']}; port={$config['port']};dbname={$config['dbname']}";

        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            /* Note you can fetch the database data as either an Associate array or object
            to fetch as Associate array, you pass in PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            to fetch as object , you pass in PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            When it's passed in as an obj you access your array objects as $listings->title
            When it's passed in as an Associate array you access your array objects as $listings['title']


*/
        ];
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $option);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * @param string $$query
     * @return PDOStatement
     * @throws  PDOException
     */

    public function query($query, $params = [])
    {
        try {
            $sth = $this->conn->prepare($query);
            /*
               bind named params
               this will allow us not add the user input directly ito the database query
               this helps to prevent sql injections
               
            */
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value);
            }
            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
