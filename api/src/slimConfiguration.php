<?php

namespace src;

use App\DAO\VeiculosDAO;

function slimConfiguration(): \Slim\Container{
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
        ],
    ];
    $container = new \Slim\Container($configuration);

    $container->offsetSet(VeiculosDAO::class, new VeiculosDAO());

    return $container;
}
