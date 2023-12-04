<?php

namespace core;

class Controller
{
    protected $response;
    protected $request;
    protected $validator;
    protected $model;

    public function __construct(Response $response, Request $request, Validator $validator, Model $model)
    {
        $this->response = $response;
        $this->request = $request;
        $this->validator = $validator;
        $this->model = $model;
    }
}