<?php

namespace core;

class Router
{
    public Request $request;
    public Response $response;
    public Validator $validator;
    public Model $model;
    protected array $routes = [];

    public function __construct(Request $request, Response $response, Validator $validator, Model $model)
    {
        $this->request = $request;
        $this->response = $response;
        $this->validator = $validator;
        $this->model = $model;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            return $this->response->setStatusCode(404);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]($this->response, $this->request, $this->validator, $this->model);
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback, $this->request);
    }
}
