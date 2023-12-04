<?php

namespace app\services;

use app\services\interfaces\UserServiceInterface;
use core\Application;
use PDO;


class UserPDOService implements UserServiceInterface
{
    public function insertUser(array $data)
    {
        $db = Application::$app->database;

        $query = "INSERT INTO user (firstName, lastName, city, street, country) 
                        VALUES (:firstName, :lastName, :city, :street, :country)";
        $params = [
            ':firstName' => $data['firstName'],
            ':lastName' => $data['lastName'],
            ':city' => $data['city'],
            ':street' => $data['street'],
            ':country' => $data['country'],
        ];

        return $db->executeQuery($query, $params);
    }

    public function getUser()
    {
        $db = Application::$app->database;
        $query = "SELECT * FROM user";
        return $db->executeQuery($query)->fetchAll(PDO::FETCH_OBJ);
    }
}