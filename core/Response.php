<?php

namespace core;

class Response
{
    public function  setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    public function json(array $data, int $statusCode = 200) : void
    {
        header('Content-Type: application/json');
        $this->setStatusCode($statusCode);
        echo json_encode($data);
        exit;
    }
}