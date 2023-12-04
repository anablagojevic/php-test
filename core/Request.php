<?php

namespace core;

class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position=strpos($path,'?');
        if(!$position){
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody()
    {
        $body = [];

        if ($this->isGet()) {
            $body = $_GET;
        }

        if ($this->isPost()) {
            $body = $_POST;
        }

        if ($this->getContentType() === 'application/json') {
            $input = file_get_contents('php://input');
            $body = json_decode($input, true);
        }

        return $body;
    }

    public function getContentType()
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

        if (empty($contentType) && isset($_SERVER['HTTP_ACCEPT'])) {
            $acceptHeader = $_SERVER['HTTP_ACCEPT'];
            $acceptParts = explode(';', $acceptHeader);
            $contentType = trim($acceptParts[0]);
        }

        return $contentType;
    }


    public function isGet(){
        return $this->method() === "get";
    }

    public function isPost(){
        return $this->method() === "post";
    }
}