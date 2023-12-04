<?php

namespace app\models;

use app\services\interfaces\UserServiceInterface;
use core\Model;

class UserModel implements Model
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function create(array $data)
    {
       return $this->userService->insertUser($data);
    }

    public function read()
    {
        return $this->userService->getUser();
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(array $data)
    {
        // TODO: Implement delete() method.
    }
}