<?php

require_once __DIR__ . '/../Autoloader.php';
Autoloader::register();

use core\Application;
use core\ServicesRegistry;
use app\controllers\UserController;

$container = ServicesRegistry::registerServices();

$app = new Application($container);

$app->router->get('/',function (){
    echo "radi";
});

$app->router->get('/api/users',[UserController::class,'get']);
$app->router->post('/api/users',[UserController::class,'post']);

$app->run();


