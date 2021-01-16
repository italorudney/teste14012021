<?php

use function src\slimConfiguration;
;
use App\Controllers\{
    VeiculoController,
    PessoaController,
    ExceptionController
};


$app = new \Slim\App(slimConfiguration());



$app->group('', function () use ($app) {
    $app->get('/veiculo', VeiculoController::class . ':getVeiculos');
    $app->post('/veiculo', VeiculoController::class . ':insertVeiculo');
    $app->put('/veiculo', VeiculoController::class . ':updateVeiculo');
    $app->delete('/veiculo', VeiculoController::class . ':deleteVeiculo');

    $app->get('/pessoa', PessoaController::class . ':getPessoas');
    $app->post('/pessoa', PessoaController::class . ':insertPessoa');
    $app->put('/pessoa', PessoaController::class . ':updatePessoa');
    $app->delete('/pessoa', PessoaController::class . ':deletePessoa');


});

$app->run();

