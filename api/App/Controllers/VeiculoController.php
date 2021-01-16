<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\VeiculosDAO;
use App\Models\VeiculoModel;
use App\Models\PessoaModel;
use Slim\Container;

    final class VeiculoController
    {
        private $veiculosDAO;

        public function __construct(Container $container)
        {
            $this->veiculosDAO = $container->offsetGet(VeiculosDAO::class);
        }
        public function getVeiculos(Request $request, Response $response, array $args): Response
        {
            $veiculos = $this->veiculosDAO->getAllVeiculos();
            $response->getBody()->write(
                json_encode(
                    $veiculos,
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                )
            );
    
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }

        public function insertVeiculo(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();
            $veiculo = new VeiculoModel();
            $veiculo->setVei_descricao($data['vei_descricao'])
                ->setVei_marca($data['vei_marca'])
                ->setVei_placa($data['vei_placa'])
                ->setVei_chassi($data['vei_chassi'])
                ->setVei_cor($data['vei_cor']);
            $this->veiculosDAO->insertVeiculo($veiculo);
    
            $response = $response->withJson([
                'message' => 'Veiculo inserido com sucesso!'
            ]);
    
            return $response;
        }
    
        public function updateVeiculo(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();

            $veiculo = new VeiculoModel();
            $veiculo->setVei_id((int)$data['vei_id'])
            ->setVei_descricao($data['vei_descricao'])
            ->setVei_marca($data['vei_marca'])
            ->setVei_placa($data['vei_placa'])
            ->setVei_chassi($data['vei_chassi'])
            ->setVei_cor($data['vei_cor']);
            $this->veiculosDAO->updateVeiculo($veiculo);
    
            $response = $response->withJson([
                'message' => 'Veiculo alterada com sucesso!'
            ]);
    
            return $response;
        }
    
        public function deleteVeiculo(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();
    
            $id = (int)$data['vei_id'];
            $this->veiculosDAO->deleteVeiculo($id);
    
            $response = $response->withJson([
                'message' => 'Veiculo excluída com sucesso!'
            ]);
    
            return $response;
        }
        public function alugaVeiculo(Request $request, Response $response, array $args): Response
        {
        
            $data = $request->getParsedBody();
    
            $vei_id = (int)$data['vei_id'];
            $per_id = (int)$data['per_id'];
            $this->veiculosDAO->alugarVeiculo($vei_id,$per_id);
    
            $response = $response->withJson([
                'message' => 'Veiculo Alugado com sucesso!'
            ]);
    
            return $response;

        }
    }
