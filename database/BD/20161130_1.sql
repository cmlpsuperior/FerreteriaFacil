-- MySQL Script generated by MySQL Workbench
-- 11/30/16 16:34:28
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema BDPlanificaMYPE
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BDPlanificaMYPE
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BDFerreteriaFacil` DEFAULT CHARACTER SET utf8 ;
USE `BDFerreteriaFacil` ;

-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`TipoDocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`TipoDocumento` (
  `idTipoDocumento` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoDocumento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Zona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Zona` (
  `idZona` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `montoFlete` DOUBLE NOT NULL,
  PRIMARY KEY (`idZona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidoPaterno` VARCHAR(100) NOT NULL,
  `apellidoMaterno` VARCHAR(100) NULL,
  `numeroDocumento` VARCHAR(20) NOT NULL,
  `fechaNacimiento` DATETIME NULL,
  `genero` VARCHAR(50) NULL,
  `telefono` VARCHAR(20) NULL,
  `correo` VARCHAR(100) NULL,
  `direccion` VARCHAR(100) NULL,
  `referencia` VARCHAR(100) NULL,
  `idTipoDocumento` INT NOT NULL,
  `idZona` INT NULL,
  PRIMARY KEY (`idCliente`),
  CONSTRAINT `FK_Cliente_TipoDocumento`
    FOREIGN KEY (`idTipoDocumento`)
    REFERENCES `BDPlanificaMYPE`.`TipoDocumento` (`idTipoDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Cliente_Zona`
    FOREIGN KEY (`idZona`)
    REFERENCES `BDPlanificaMYPE`.`Zona` (`idZona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_Cliente_TipoDocumento_idx` ON `BDPlanificaMYPE`.`Cliente` (`idTipoDocumento` ASC);

CREATE INDEX `FK_Cliente_Zona_idx` ON `BDPlanificaMYPE`.`Cliente` (`idZona` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `usuario_UNIQUE` ON `BDPlanificaMYPE`.`Users` (`usuario` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Empleado` (
  `idEmpleado` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidoPaterno` VARCHAR(100) NOT NULL,
  `apellidoMaterno` VARCHAR(100) NOT NULL,
  `fechaNacimiento` VARCHAR(45) NOT NULL,
  `numeroDocumento` VARCHAR(20) NOT NULL,
  `correo` VARCHAR(100) NULL,
  `estado` VARCHAR(50) NOT NULL,
  `licencia` VARCHAR(50) NULL,
  `fechaIngreso` DATETIME NOT NULL,
  `fechaSalida` DATETIME NULL,
  `idCargo` INT NOT NULL,
  `idTipoDocumento` INT NOT NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  CONSTRAINT `FK_Empleado_TipoDocumento`
    FOREIGN KEY (`idTipoDocumento`)
    REFERENCES `BDPlanificaMYPE`.`TipoDocumento` (`idTipoDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Empleado_Cargo`
    FOREIGN KEY (`idCargo`)
    REFERENCES `BDPlanificaMYPE`.`Cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Empleado_Users`
    FOREIGN KEY (`idUser`)
    REFERENCES `BDPlanificaMYPE`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_Empleado_TipoDocumento_idx` ON `BDPlanificaMYPE`.`Empleado` (`idTipoDocumento` ASC);

CREATE INDEX `FK_Empleado_Cargo_idx` ON `BDPlanificaMYPE`.`Empleado` (`idCargo` ASC);

CREATE INDEX `FK_Empleado_Users_idx` ON `BDPlanificaMYPE`.`Empleado` (`idUser` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `fechaRegistro` DATETIME NOT NULL,
  `montoTotal` DOUBLE NOT NULL,
  `montoPagado` DOUBLE NOT NULL,
  `estado` VARCHAR(20) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `idZona` INT NULL,
  `idCliente` INT NOT NULL,
  `idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  CONSTRAINT `FK_Pedido_Cliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `BDPlanificaMYPE`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Pedido_Empleado`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `BDPlanificaMYPE`.`Empleado` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Pedido_Zona`
    FOREIGN KEY (`idZona`)
    REFERENCES `BDPlanificaMYPE`.`Zona` (`idZona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_Pedido_Cliente_idx` ON `BDPlanificaMYPE`.`Pedido` (`idCliente` ASC);

CREATE INDEX `FK_Pedido_Empleado_idx` ON `BDPlanificaMYPE`.`Pedido` (`idEmpleado` ASC);

CREATE INDEX `FK_Pedido_Zona_idx` ON `BDPlanificaMYPE`.`Pedido` (`idZona` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`UnidadMedida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`UnidadMedida` (
  `idUnidadMedida` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUnidadMedida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`Articulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`Articulo` (
  `idArticulo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `precioBase` DOUBLE NOT NULL,
  `activo` TINYINT(1) NOT NULL,
  `idUnidadMedida` INT NOT NULL,
  PRIMARY KEY (`idArticulo`),
  CONSTRAINT `FK_Articulo_UnidadMedida`
    FOREIGN KEY (`idUnidadMedida`)
    REFERENCES `BDPlanificaMYPE`.`UnidadMedida` (`idUnidadMedida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_Articulo_UnidadMedida_idx` ON `BDPlanificaMYPE`.`Articulo` (`idUnidadMedida` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`DetallePedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`DetallePedido` (
  `idPedido` INT NOT NULL,
  `idArticulo` INT NOT NULL,
  `cantidad` DOUBLE NOT NULL,
  `precioUnitario` DOUBLE NOT NULL,
  `monto` DOUBLE NOT NULL,
  PRIMARY KEY (`idPedido`, `idArticulo`),
  CONSTRAINT `FK_DetallePedido_Pedido`
    FOREIGN KEY (`idPedido`)
    REFERENCES `BDPlanificaMYPE`.`Pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_DetallePedido_Articulo`
    FOREIGN KEY (`idArticulo`)
    REFERENCES `BDPlanificaMYPE`.`Articulo` (`idArticulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_DetallePedido_Articulo_idx` ON `BDPlanificaMYPE`.`DetallePedido` (`idArticulo` ASC);


-- -----------------------------------------------------
-- Table `BDPlanificaMYPE`.`ArticuloXZona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BDPlanificaMYPE`.`ArticuloXZona` (
  `idArticulo` INT NOT NULL,
  `idZona` INT NOT NULL,
  `precio` DOUBLE NOT NULL,
  PRIMARY KEY (`idArticulo`, `idZona`),
  CONSTRAINT `FK_ArticuloXZona_Articulo`
    FOREIGN KEY (`idArticulo`)
    REFERENCES `BDPlanificaMYPE`.`Articulo` (`idArticulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ArticuloXZona_Zona`
    FOREIGN KEY (`idZona`)
    REFERENCES `BDPlanificaMYPE`.`Zona` (`idZona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `FK_ArticuloXZona_Zona_idx` ON `BDPlanificaMYPE`.`ArticuloXZona` (`idZona` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`TipoDocumento`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`TipoDocumento` ( `nombre`, `descripcion`) VALUES ( 'DNI', 'Documento nacional de identidad de un ciudadano peruano');
INSERT INTO `BDPlanificaMYPE`.`TipoDocumento` ( `nombre`, `descripcion`) VALUES ( 'Pasaporte', 'Documento de identificación para los extranjeros');

COMMIT;


-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`Zona`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`Zona` ( `nombre`, `montoFlete`) VALUES ( 'Casa blanca', 15);
INSERT INTO `BDPlanificaMYPE`.`Zona` ( `nombre`, `montoFlete`) VALUES ( 'Montenegro', 20);
INSERT INTO `BDPlanificaMYPE`.`Zona` ( `nombre`, `montoFlete`) VALUES ( 'Cristo rey bajo', 10);
INSERT INTO `BDPlanificaMYPE`.`Zona` ( `nombre`, `montoFlete`) VALUES ( 'Cristo rey alto', 15);
INSERT INTO `BDPlanificaMYPE`.`Zona` ( `nombre`, `montoFlete`) VALUES ( '10 de octubre', 20);

COMMIT;


-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`Cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`Cargo` ( `nombre`, `descripcion`) VALUES ( 'Administrador del sistema', 'Administrador del sistema.');
INSERT INTO `BDPlanificaMYPE`.`Cargo` ( `nombre`, `descripcion`) VALUES ( 'Supervisor', 'Persona que se encarga de planificar los pedidos.');
INSERT INTO `BDPlanificaMYPE`.`Cargo` ( `nombre`, `descripcion`) VALUES ( 'Recepcionista', 'Persona que registra los nuevos pedidos.');
INSERT INTO `BDPlanificaMYPE`.`Cargo` ( `nombre`, `descripcion`) VALUES ( 'Chofer', 'Persona que se encarga de enviar los pedidos al cliente');

COMMIT;


-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`Users`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`Users` ( `name`, `usuario`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ( '46618582', '46618582', '$2y$10$wezuiI.XdVAMmAowTqtvVe9OSJSAx3r4rdhBeg7ehskeIJPwaJ446', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`Empleado`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`Empleado` ( `nombres`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `numeroDocumento`, `correo`, `estado`, `licencia`, `fechaIngreso`, `fechaSalida`, `idCargo`, `idTipoDocumento`, `idUser`) 
		VALUES ( 'Henry Antonio', 'Espinoza', 'Torres', '1990-11-20', '46618582', 'henryespinozat@gmail.com', 'Activo', NULL, '2016-10-01', NULL, 1, 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `BDPlanificaMYPE`.`UnidadMedida`
-- -----------------------------------------------------
START TRANSACTION;
USE `BDPlanificaMYPE`;
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'kg');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'm3');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'bolsa');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'varilla');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'unidad');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'lata');
INSERT INTO `BDPlanificaMYPE`.`UnidadMedida` ( `nombre`) VALUES ( 'balon');

COMMIT;

