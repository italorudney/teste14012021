<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\PessoasDAO;
use App\Models\PessoaModel;
use App\Controllers\Validate;
use Slim\Container;

    final class PessoaController extends PessoaModel
    {
        private $pessoasDAO;
        private $validate;

        public function __construct(Container $container)
        {
            $this->pessoasDAO = $container->offsetGet(PessoasDAO::class);
            $this->validate = new Validate();
        }
        public function getPessoas(Request $request, Response $response, array $args): Response
        {
            $pessoas = $this->pessoasDAO->getAllPessoas();
            $response->getBody()->write(
                json_encode(
                    $pessoas,
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                )
            );
    
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }

        public function insertPessoa(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();
            $this->validate->required(['per_nome','per_contato','per_cpf_cnpj'], $data);
            if (count($this->validate->getErrors()) > 0) {
                return $this->validate->trataError($response);
            }
            $this->setPer_nome($data['per_nome'])
                ->setPer_contato($data['per_contato'])
                ->setPer_cpf_cnpj($data['per_cpf_cnpj']);
            $this->pessoasDAO->insertPessoa($this);
    
            $response = $response->withJson([
                'message' => 'Pessoa inserida com sucesso!'
            ]);
    
            return $response;
        }
    
        public function updatePessoa(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();
            $this->validate->required(['per_nome','per_contato','per_cpf_cnpj','per_id'], $data);
            if (count($this->validate->getErrors()) > 0) {
                return $this->validate->trataError($response);
            }
            $this->setPer_id((int)$data['per_id'])
                ->setPer_nome($data['per_nome'])
                ->setPer_contato($data['per_contato'])
                ->setPer_cpf_cnpj($data['per_cpf_cnpj']);
            $this->pessoasDAO->updatePessoa($this);
    
            $response = $response->withJson([
                'message' => 'Pessoa alterada com sucesso!'
            ]);
    
            return $response;
        }
    
        public function deletePessoa(Request $request, Response $response, array $args): Response
        {
            $data = $request->getParsedBody();
            $this->validate->required(['per_id'], $data);
            if (count($this->validate->getErrors()) > 0) {
                return $this->validate->trataError($response);
            }
            $id = (int)$data['per_id'];
            $this->pessoasDAO->deletePessoa($id);
    
            $response = $response->withJson([
                'message' => 'Pessoa excluída com sucesso!'
            ]);
    
            return $response;
        }
    }
