SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipo_documentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`facultades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`facultades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`p_academicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`p_academicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idfacultad` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`profesores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`profesores` (
  `id` INT NOT NULL,
  `id_programa` INT NOT NULL,
  `tipo_documento` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `apellidos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `n_documento` INT(22) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` INT(10) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `escalafon` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`p_trabajos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`p_trabajos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_profesor` INT NOT NULL,
  `periodo_academico` VARCHAR(45) NOT NULL,
  `dedicacion` VARCHAR(45) NOT NULL,
  `tipo_vinculado` VARCHAR(45) NOT NULL,
  `fecha_elaboracion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipo_actividades` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`actividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_plan_trabajo` INT NOT NULL,
  `id_tipo_actividad` INT NOT NULL,
  `actividad` VARCHAR(45) NOT NULL,
  `horas_semanales` INT NOT NULL,
  `horas_semestre` INT NOT NULL,
  `alcance` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aprobacion_planes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`aprobacion_planes` (
  `id` INT NOT NULL,
  `id_actividad_ap` INT NOT NULL,
  `fecha_aprobacion` DATE NOT NULL,
  `id_usuario_aprobacion` INT NOT NULL,
  `aprobado` CHAR(2) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`criterios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`criterios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `criterio` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rubricas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rubricas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_criterio_eval` INT NOT NULL,
  `concepto` VARCHAR(45) NOT NULL,
  `fecha` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`opciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`opciones` (
  `id` MEDIUMINT(7) NOT NULL,
  `id_categoria` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `valor` TINYINT(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tareas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tareas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_actividad_t` INT NOT NULL,
  `descripcion` VARCHAR(455) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evidencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evidencias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_tarea` INT NOT NULL,
  `id_usuario_profesor` INT NOT NULL,
  `comentario` VARCHAR(250) NULL,
  `directorio` VARCHAR(1000) NULL,
  `fecha_de_carga` DATE NOT NULL,
  `hora_de_carga` TIME NOT NULL,
  `porcentaje_avance` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`actividad_evaluadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`actividad_evaluadas` (
  `id` INT NOT NULL,
  `actividades_id_actividad` INT NOT NULL,
  `rubrica_id_rubrica` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dependencias` (
  `id` SMALLINT(2) NOT NULL,
  `nombre_dependencia` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evaluadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evaluadores` (
  `id` INT NOT NULL,
  `dependencia_id_dependencia` SMALLINT(2) NOT NULL,
  `nombres_completos` VARCHAR(45) NOT NULL,
  `documento` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
  
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`opcion_evaluaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`opcion_evaluaciones` (
  `id` INT NOT NULL,
  `opciones_id_opciones` MEDIUMINT(7) NOT NULL,
  `actividad_evaluar_id_actividad_evaluar` INT NOT NULL,
  `evaluador_id_evaluador` INT NOT NULL,
  `resultado` TINYINT(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
