<?php

namespace App\Models;

class PessoaModel
{

    private $per_id;
    private $per_nome;
    private $per_contato;
    private $per_cpf_cnpj;


    function getPer_id(): int {
        return $this->per_id;
    }

    function getPer_nome(): string {
        return $this->per_nome;
    }

    function getPer_contato(): string {
        return $this->per_contato;
    }

    function getPer_cpf_cnpj(): string {
        return $this->per_cpf_cnpj;
    }

    function setPer_id(int $per_id): PessoaModel {
        $this->per_id = $per_id;
        return $this;
    }

    function setPer_nome(string $per_nome): PessoaModel {
        $this->per_nome = $per_nome;
        return $this;
    }

    function setPer_contato(string $per_contato): PessoaModel {
        $this->per_contato = $per_contato;
        return $this;
    }

    function setPer_cpf_cnpj(string $per_cpf_cnpj): PessoaModel {
        $this->per_cpf_cnpj = $per_cpf_cnpj;
        return $this;
    }
}