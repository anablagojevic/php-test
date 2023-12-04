<?php

namespace config;

class DatabaseConfig
{
    private static $instance = null;

    private $host;
    private $username;
    private $password;
    private $database;

    private function __construct()
    {
        $env = parse_ini_file(dirname(__DIR__) . '/config/.env');

        $this->host = $env['DB_HOST'];
        $this->username = $env['DB_USERNAME'];
        $this->password = $env['DB_PASSWORD'];
        $this->database = $env['DB_NAME'];
    }

    public static function getConfigInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
