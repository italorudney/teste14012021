<?php

namespace App\Models;

final class VeiculoModel
{

    private $vei_id;
    private $vei_descricao;
    private $vei_marca;
    private $vei_placa;
    private $vei_chassi;
    private $vei_cor;
    private $vei_status;


    function getVei_id(): int {
        return $this->vei_id;
    }

    function getVei_descricao(): string {
        return $this->vei_descricao;
    }

    function getVei_marca(): string {
        return $this->vei_marca;
    }

    function getVei_placa(): string {
        return $this->vei_placa;
    }

    function getVei_chassi(): string {
        return $this->vei_chassi;
    }

    function getVei_cor(): string {
        return $this->vei_cor;
    }

    function getVei_status(): string {
        return $this->vei_status;
    }

    function setVei_id(int $vei_id): VeiculoModel {
        $this->vei_id = $vei_id;
        return $this;
    }

    function setVei_descricao(string $vei_descricao): VeiculoModel {
        $this->vei_descricao = $vei_descricao;
        return $this;
    }

    function setVei_marca(string $vei_marca): VeiculoModel {
        $this->vei_marca = $vei_marca;
        return $this;
    }

    function setVei_placa(string $vei_placa): VeiculoModel {
        $this->vei_placa = $vei_placa;
        return $this;
    }

    function setVei_chassi(string $vei_chassi): VeiculoModel {
        $this->vei_chassi = $vei_chassi;
        return $this;
    }

    function setVei_cor(string $vei_cor): VeiculoModel {
        $this->vei_cor = $vei_cor;
        return $this;
    }

    function setVei_status(string $vei_status): VeiculoModel {
        $this->vei_status = $vei_status;
        return $this;
    }


}