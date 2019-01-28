<?php


namespace models;


class database
{
    public function __construct()
    {
        $db = new \PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
        $db->prepare('SELECT * FROM `users`');

      //  return $db;

    }
}