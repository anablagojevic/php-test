<?php

namespace app\controllers;

use app\models\UserModel;
use app\services\UserValidator;
use core\Controller;
use core\Request;
use core\Response;

class UserController extends Controller
{

    public function __construct(Response $response,
                                Request $request,
                                UserValidator $validator,
                                UserModel $model
                                )
    {
        parent::__construct($response, $request, $validator, $model);
    }

    public function get()
    {
        try {
            $data = $this->model->read();
            $this->response->setStatusCode(200);
            $this->response->json($data);
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);
            $this->response->json(['error' => $e->getMessage()]);
        }
    }

    public function post()
    {
        $data = $this->request->getBody();
        $validationResult = $this->validator->validateData($data);

        if ($validationResult === true) {
            try {
                $this->model->create($data);
                $this->response->setStatusCode(201); // Created
                $this->response->json(['message' => 'User has been successfully added.']);
            } catch (\Exception $e) {
                $this->response->setStatusCode(500);
                $this->response->json(['error' => 'Error while inserting user into the database.']);
            }
        } else {
            $this->response->setStatusCode(400);
            $this->response->json(['errors' => $validationResult]);
        }
    }
}