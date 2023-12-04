<?php

namespace core;

use database\Database;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static Application $app;
    public Database $database;

    public function __construct(DIContainer $container)
    {
        self::$app = $this;
        $this->request = $container->resolve('Request');
        $this->response = $container->resolve('Response');
        $this->router = $container->resolve('Router');
        $this->controller = $container->resolve('Controller');
        $this->database = $container->resolve('Database');
    }

    public function run(): void
    {
        $this->router->resolve();
    }
}
