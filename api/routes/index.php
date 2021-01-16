<?php

use function src\slimConfiguration;
use App\Controllers\VeiculoController;



$app = new \Slim\App(slimConfiguration());


$app->get('/veiculos', VeiculoController::class . ':getVeiculos');

// $app->post('/veiculo', function (Request $request, Response $response, array $args) {
//     $dados = $request->getParsedBody();
//     print_r($dados);
// });

// $app->put('/veiculo', function (Request $request, Response $response, array $args) {
//     $dados = $request->getParsedBody();
//     print_r($dados);
// });

// $app->delete('/veiculo', function (Request $request, Response $response, array $args) {
//     $dados = $request->getParsedBody();
//     print_r($dados);
// });

$app->run();

