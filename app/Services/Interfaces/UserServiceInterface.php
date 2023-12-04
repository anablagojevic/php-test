<?php

namespace app\services\interfaces;

interface UserServiceInterface
{
    public function insertUser(array $data);
    public function getUser();
}