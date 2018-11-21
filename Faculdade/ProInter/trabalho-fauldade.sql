
CREATE TABLE `jotta_veiculos`.`cadastro_veiculos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(20) NULL DEFAULT NULL,
  `modelo` VARCHAR(50) NULL DEFAULT NULL,
  `ano` DATE NULL DEFAULT NULL,
  `cor` VARCHAR(15) NULL DEFAULT NULL,
  `cambio` VARCHAR(15) NULL DEFAULT NULL,
  `quilometragem` DECIMAL NULL DEFAULT NULL,
  `preco` DECIMAL NULL DEFAULT NULL,
  `placa` CHAR(7) NULL DEFAULT NULL,
  `combustivel` VARCHAR(10) NULL DEFAULT NULL,
  `carroceria` VARCHAR(15) NULL DEFAULT NULL,
  `ipva` CHAR(1) NULL DEFAULT NULL,
  `itens_opcionais` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `jotta_veiculos`.`contato` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `telefone` INT(13) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `mensagem` TEXT NULL DEFAULT NULL,
  `cadastro_veiculos_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_contato_cadastro_veiculos1`
    FOREIGN KEY (`cadastro_veiculos_id`)
    REFERENCES `jotta_veiculos`.`cadastro_veiculos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `jotta_veiculos`.`propostas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(20) NULL DEFAULT NULL,
  `modelo` VARCHAR(50) NULL DEFAULT NULL,
  `ano` DATE NULL DEFAULT NULL,
  `cambio` VARCHAR(15) NULL DEFAULT NULL,
  `quilometragem` DECIMAL NULL DEFAULT NULL,
  `combustivel` VARCHAR(10) NULL DEFAULT NULL,
  `carroceria` VARCHAR(15) NULL DEFAULT NULL,
  `valor_entrada` DECIMAL NULL DEFAULT NULL,
  `financiar` CHAR(1) NULL DEFAULT NULL,
  `cadastro_veiculos_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_propostas_cadastro_veiculos`
    FOREIGN KEY (`cadastro_veiculos_id`)
    REFERENCES `jotta_veiculos`.`cadastro_veiculos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;