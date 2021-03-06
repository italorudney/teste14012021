# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.1.0                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          modelagemLocadora.dez                           #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2021-01-15 15:52                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #
ALTER TABLE `loc_cliente` DROP FOREIGN KEY `loc_pessoa_loc_cliente`;
ALTER TABLE `loc_cliente` DROP FOREIGN KEY `loc_veiculo_loc_cliente`;

# ---------------------------------------------------------------------- #
# Drop table "loc_cliente"                                               #
# ---------------------------------------------------------------------- #

# Drop constraints #
ALTER TABLE `loc_cliente` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `loc_cliente`;

# ---------------------------------------------------------------------- #
# Drop table "loc_pessoa"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `loc_pessoa` MODIFY `per_id` INTEGER(11) NOT NULL;

# Drop constraints #
ALTER TABLE `loc_pessoa` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `loc_pessoa`;

# ---------------------------------------------------------------------- #
# Drop table "loc_veiculo"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #
ALTER TABLE `loc_veiculo` MODIFY `vei_id` INTEGER(11) NOT NULL;

# Drop constraints #
ALTER TABLE `loc_veiculo` ALTER COLUMN `vei_status` DROP DEFAULT;
ALTER TABLE `loc_veiculo` DROP PRIMARY KEY;

# Drop table #
DROP TABLE `loc_veiculo`;
