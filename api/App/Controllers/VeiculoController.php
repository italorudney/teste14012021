<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

    final class VeiculoController
    {

        public function getVeiculos(Request $request, Response $response, array $args): Response
        {
            $response = $response->withJson(
                [
                    "mensagem" => "",
                    "dados" => ""
                ]);
            return $response;
        }
    }
