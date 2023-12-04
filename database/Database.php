<?php

namespace database;

use config\DatabaseConfig;
use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $connection;

    private function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                $config = DatabaseConfig::getConfigInstance();

                $connection = new PDO(
                    'mysql:host=' . $config->getHost() . ';dbname=' . $config->getDatabase(),
                    $config->getUsername(),
                    $config->getPassword()
                );

                self::$instance = new self($connection);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);

            if (!empty($params)) {
                foreach ($params as $param => $value) {
                    $statement->bindValue($param, $value);
                }
            }

            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}