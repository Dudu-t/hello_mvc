<?php


namespace models;


class database
{
    public function connect()
    {
        try {
            $opcoes = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
            $db = new \PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS, $opcoes);
            return $db;

        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }
}