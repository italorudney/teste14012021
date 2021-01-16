<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/./vendor/autoload.php';

$app = new \Slim\App();


$app->get('/veiculos', function (Request $request, Response $response, array $args) {
    print '1';
    return $response;
});
$app->post('/veiculo', function (Request $request, Response $response, array $args) {
    $dados = $request->getParsedBody();
    print_r($dados);
});

$app->put('/veiculo', function (Request $request, Response $response, array $args) {
    $dados = $request->getParsedBody();
    print_r($dados);
});

$app->delete('/veiculo', function (Request $request, Response $response, array $args) {
    $dados = $request->getParsedBody();
    print_r($dados);
});

$app->run();
