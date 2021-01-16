<?php

namespace src;

use App\DAO\VeiculosDAO;
use App\DAO\PessoasDAO;

function slimConfiguration(): \Slim\Container{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
        ],
    ];
    $container = new \Slim\Container($configuration);

    $container->offsetSet(PessoasDAO::class, new PessoasDAO());
    $container->offsetSet(VeiculosDAO::class, new VeiculosDAO());

    return $container;
}
