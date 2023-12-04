<?php

namespace core;

use app\models\UserModel;
use app\services\interfaces\UserServiceInterface;
use app\services\UserPDOService;
use app\services\UserValidator;
use database\Database;

class ServicesRegistry
{
    public static function registerServices()
    {
        $container = new DIContainer();

        $container->register('Router', function () use ($container) {
            return new Router(
                $container->resolve('Request'),
                $container->resolve('Response'),
                $container->resolve(Validator::class),
                $container->resolve(Model::class)
            );
        });

        $container->register('Request', function () {
            return new Request();
        });

        $container->register('Response', function () {
            return new Response();
        });

        $container->register('Controller', function () use ($container) {
            return new Controller(
                $container->resolve('Response'),
                $container->resolve('Request'),
                $container->resolve(Validator::class),
                $container->resolve(Model::class)
            );
        });

        $container->register('Database', function () {
            return Database::getInstance();
        });


        $container->register(Model::class, function () use ($container) {
            return new UserModel(
                $container->resolve(UserServiceInterface::class)
            );
        });


        $container->register(Validator::class, UserValidator::class);
        $container->register(UserServiceInterface::class, UserPDOService::class);

        return $container;
    }
}