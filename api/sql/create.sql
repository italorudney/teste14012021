# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.1.0                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          modelagemLocadora.dez                           #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2021-01-15 15:52                                #
# ---------------------------------------------------------------------- #

CREATE DATABASE `locadora`;
USE locadora;
# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "loc_veiculo"                                                #
# ---------------------------------------------------------------------- #
CREATE TABLE `loc_veiculo` (
    `vei_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `vei_descricao` VARCHAR(200) NOT NULL,
    `vei_marca` VARCHAR(200) NOT NULL,
    `vei_placa` VARCHAR(200) NOT NULL,
    `vei_chassi` VARCHAR(200) NOT NULL,
    `vei_cor` VARCHAR(200) NOT NULL,
    `vei_status` VARCHAR(1) DEFAULT 'D' COMMENT 'D- DISPONIVEL M- MANUTENÇÃO U- UTILIZADO',
    CONSTRAINT `PK_loc_veiculo` PRIMARY KEY (`vei_id`)
);

# ---------------------------------------------------------------------- #
# Add table "loc_pessoa"                                                 #
# ---------------------------------------------------------------------- #
CREATE TABLE `loc_pessoa` (
    `per_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
    `per_nome` VARCHAR(200),
    `per_contato` VARCHAR(200),
    `per_cpf_cnpj` VARCHAR(200),
    CONSTRAINT `PK_loc_pessoa` PRIMARY KEY (`per_id`)
);

# ---------------------------------------------------------------------- #
# Add table "loc_cliente"                                                #
# ---------------------------------------------------------------------- #
CREATE TABLE `loc_cliente` (
    `cli_codigo` INTEGER NOT NULL,
    `per_id` INTEGER(11) NOT NULL,
    `vei_id` INTEGER(11) NOT NULL,
    `cli_data_hora_retirada` DATETIME DEFAULT current_timestamp,
    `cli_data_hora_entrega` DATETIME DEFAULT current_timestamp,
    `cli_status` VARCHAR(1),
    CONSTRAINT `PK_loc_cliente` PRIMARY KEY (`cli_codigo`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #
ALTER TABLE `loc_cliente` ADD CONSTRAINT `loc_pessoa_loc_cliente` 
    FOREIGN KEY (`per_id`) REFERENCES `loc_pessoa` (`per_id`);
ALTER TABLE `loc_cliente` ADD CONSTRAINT `loc_veiculo_loc_cliente` 
    FOREIGN KEY (`vei_id`) REFERENCES `loc_veiculo` (`vei_id`);