CREATE DATABASE db_empresa;

USE db_emoresa;

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE IF NOT EXISTS `empresas` (
  `nome` varchar(999) NOT NULL,
  `cnpj` bigint(20) NOT NULL,
  `cnae` int(11) NOT NULL,
  `endereco` varchar(9999) NOT NULL,
  PRIMARY KEY (`cnpj`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB;
