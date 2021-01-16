<?php
namespace App\Controllers;

final class Validate
{
    private $errors = [];

    public function required(array $fields, array $data)
    {

        foreach ($fields as $field) {
            if (empty($data[$field])) {
                $this->errors[$field] = "O campo é obrigatorio";
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
    public function trataError($response)
    {
           $response = $response->withJson([
               'message' => $this->getErrors()
           ])->withStatus(400);
           return $response;

    }
}
