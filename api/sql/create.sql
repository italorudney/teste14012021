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
    `vei_status` VARCHAR(1) DEFAULT 'D' COMMENT 'D- DISPONIVEL U- UTILIZADO',
    CONSTRAINT `PK_loc_veiculo` PRIMARY KEY (`vei_id`)
);

# ---------------------------------------------------------------------- #
# Insert loc_veiculo                                                     #
# ---------------------------------------------------------------------- #
INSERT INTO `loc_veiculo` (`vei_descricao`, `vei_marca`, `vei_placa`, `vei_chassi`, `vei_cor`, `vei_status`) VALUES ('FIESTA 1.6', 'FORD', 'ABC-123', 'DGW458WEG', 'BRANCO', 'D');
INSERT INTO `loc_veiculo` (`vei_descricao`, `vei_marca`, `vei_placa`, `vei_chassi`, `vei_cor`, `vei_status`) VALUES ('GOL 1.0', 'VW', 'ASF-965', 'EDWFW5485', 'PRETO', 'D');
INSERT INTO `loc_veiculo` (`vei_descricao`, `vei_marca`, `vei_placa`, `vei_chassi`, `vei_cor`, `vei_status`) VALUES ('ONIX 1.0', 'CHEVROLET', 'ASD-564', 'SDAFFSAFFS', 'PRATA', 'U');

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
# Insert loc_pessoa                                                      #
# ---------------------------------------------------------------------- #
INSERT INTO `loc_pessoa` (`per_nome`, `per_contato`, `per_cpf_cnpj`) VALUES ('Italo Rudney', '82999411653', '06501372488');
INSERT INTO `loc_pessoa` (`per_nome`, `per_contato`, `per_cpf_cnpj`) VALUES ('Lilian Santos', '82999665555', '06501372488');

# ---------------------------------------------------------------------- #
# Add table "loc_cliente"                                                #
# ---------------------------------------------------------------------- #
CREATE TABLE `loc_cliente` (
    `cli_codigo` INTEGER NOT NULL AUTO_INCREMENT, 
    `per_id` INTEGER(11) NOT NULL,
    `vei_id` INTEGER(11) NOT NULL,
    `cli_data_hora_retirada` DATETIME DEFAULT current_timestamp,
    `cli_data_hora_entrega` DATETIME DEFAULT current_timestamp,
    `cli_status` VARCHAR(1) DEFAULT 'A',
    CONSTRAINT `PK_loc_cliente` PRIMARY KEY (`cli_codigo`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #
ALTER TABLE `loc_cliente` ADD CONSTRAINT `loc_pessoa_loc_cliente` 
    FOREIGN KEY (`per_id`) REFERENCES `loc_pessoa` (`per_id`);
ALTER TABLE `loc_cliente` ADD CONSTRAINT `loc_veiculo_loc_cliente` 
    FOREIGN KEY (`vei_id`) REFERENCES `loc_veiculo` (`vei_id`);

# ---------------------------------------------------------------------- #
# Insert loc_cliente                                                     #
# ---------------------------------------------------------------------- #
INSERT INTO `loc_cliente` (`per_id`, `vei_id`, `cli_status`) VALUES ('1', '3', 'A');
UPDATE `loc_cliente` SET `cli_data_hora_entrega` = '2021-01-31 12:19:04' WHERE (`cli_codigo` = '0');


ALTER TABLE `loc_veiculo` 
RENAME TO  `loc_veiculos` ;
ALTER TABLE `loc_pessoa` 
RENAME TO  `loc_pessoas` ;
ALTER TABLE `loc_cliente` 
RENAME TO  `loc_clientes` ;