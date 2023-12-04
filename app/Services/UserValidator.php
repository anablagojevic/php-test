<?php

namespace app\services;

use core\Validator;

class UserValidator implements Validator
{
    public function validateData($data)
    {
        $errors = [];

        if (!$this->validatePattern($data['firstName'], "^[A-Z]{1}[a-z]{2,14}$")) {
            $errors['firstName'] = 'First name is not in the correct format.';
        }

        if (!$this->validatePattern($data['lastName'], "^[A-Z]{1}[a-z]{2,14}$")) {
            $errors['lastName'] = 'Last name is not in the correct format.';
        }

        if (!$this->validatePattern($data['city'], "\b[A-Z][a-zA-Z]{2,50}(?: [A-Z][a-zA-Z]*)*\b")) {
            $errors['city'] = 'City is not in the correct format.';
        }

        if (!$this->validatePattern($data['country'], "\b[A-Z][a-zA-Z]{2,50}(?: [A-Z][a-zA-Z]*)*\b")) {
            $errors['country'] = 'Country is not in the correct format.';
        }

        if (!$this->validatePattern($data['street'], "^([A-ZČĆŽŠĐ]|[1-9]{1,5})[A-ZČĆŽŠĐa-zčćžšđ\d\-\.\s]+$")) {
            $errors['street'] = 'Street is not in the correct format.';
        }

        return empty($errors) ? true : $errors;
    }

    function validatePattern(string $string, string $pattern): bool {
        return preg_match("/^$pattern$/", $string) === 1;
    }
}