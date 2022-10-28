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
  PRIMARY KEY (`id`),
  INDEX `fk_programa_academico_facultad_idx` (`idfacultad` ASC) VISIBLE,
  CONSTRAINT `fk_programa_academico_facultad`
    FOREIGN KEY (`idfacultad`)
    REFERENCES `mydb`.`facultades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_profesor_tipo_documento_idx` (`tipo_documento` ASC) VISIBLE,
  INDEX `fk_profesor_Programa academico1_idx` (`id_programa` ASC) VISIBLE,
  CONSTRAINT `fk_profesor_tipo_documento`
    FOREIGN KEY (`tipo_documento`)
    REFERENCES `mydb`.`tipo_documentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_Programa academico1`
    FOREIGN KEY (`id_programa`)
    REFERENCES `mydb`.`p_academicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_plan_de_trabajo_profesor1_idx` (`id_profesor` ASC) VISIBLE,
  CONSTRAINT `fk_plan_de_trabajo_profesor1`
    FOREIGN KEY (`id_profesor`)
    REFERENCES `mydb`.`profesores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_actividades_tipo_actividades1_idx` (`id_tipo_actividad` ASC) VISIBLE,
  INDEX `fk_actividades_plan_de_trabajo1_idx` (`id_plan_trabajo` ASC) VISIBLE,
  CONSTRAINT `fk_actividades_tipo_actividades1`
    FOREIGN KEY (`id_tipo_actividad`)
    REFERENCES `mydb`.`tipo_actividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actividades_plan_de_trabajo1`
    FOREIGN KEY (`id_plan_trabajo`)
    REFERENCES `mydb`.`p_trabajos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_aprobacion_planes_actividades1_idx` (`id_actividad_ap` ASC) VISIBLE,
  CONSTRAINT `fk_aprobacion_planes_actividades1`
    FOREIGN KEY (`id_actividad_ap`)
    REFERENCES `mydb`.`actividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_rubrica_criterios_eval1_idx` (`id_criterio_eval` ASC) VISIBLE,
  CONSTRAINT `fk_rubrica_criterios_eval1`
    FOREIGN KEY (`id_criterio_eval`)
    REFERENCES `mydb`.`criterios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  INDEX `fk_opciones_categoria1_idx` (`id_categoria` ASC) VISIBLE,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_opciones_categoria1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `mydb`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tareas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tareas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_actividad_t` INT NOT NULL,
  `descripcion` VARCHAR(455) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tareas_actividades1_idx` (`id_actividad_t` ASC) VISIBLE,
  CONSTRAINT `fk_tareas_actividades1`
    FOREIGN KEY (`id_actividad_t`)
    REFERENCES `mydb`.`actividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_evidencias_tareas1_idx` (`id_tarea` ASC) VISIBLE,
  CONSTRAINT `fk_evidencias_tareas1`
    FOREIGN KEY (`id_tarea`)
    REFERENCES `mydb`.`tareas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`actividad_evaluadas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`actividad_evaluadas` (
  `id` INT NOT NULL,
  `actividades_id_actividad` INT NOT NULL,
  `rubrica_id_rubrica` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_actividad_evaluar_rubrica1_idx` (`rubrica_id_rubrica` ASC) VISIBLE,
  INDEX `fk_actividad_evaluar_actividades1_idx` (`actividades_id_actividad` ASC) VISIBLE,
  CONSTRAINT `fk_actividad_evaluar_rubrica1`
    FOREIGN KEY (`rubrica_id_rubrica`)
    REFERENCES `mydb`.`rubricas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actividad_evaluar_actividades1`
    FOREIGN KEY (`actividades_id_actividad`)
    REFERENCES `mydb`.`actividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_evaluador_dependencia1_idx` (`dependencia_id_dependencia` ASC) VISIBLE,
  CONSTRAINT `fk_evaluador_dependencia1`
    FOREIGN KEY (`dependencia_id_dependencia`)
    REFERENCES `mydb`.`dependencias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_opciones_evaluacion_opciones1_idx` (`opciones_id_opciones` ASC) VISIBLE,
  INDEX `fk_opciones_evaluacion_actividad_evaluar1_idx` (`actividad_evaluar_id_actividad_evaluar` ASC) VISIBLE,
  INDEX `fk_opciones_evaluacion_evaluador1_idx` (`evaluador_id_evaluador` ASC) VISIBLE,
  CONSTRAINT `fk_opciones_evaluacion_opciones1`
    FOREIGN KEY (`opciones_id_opciones`)
    REFERENCES `mydb`.`opciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opciones_evaluacion_actividad_evaluar1`
    FOREIGN KEY (`actividad_evaluar_id_actividad_evaluar`)
    REFERENCES `mydb`.`actividad_evaluadas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opciones_evaluacion_evaluador1`
    FOREIGN KEY (`evaluador_id_evaluador`)
    REFERENCES `mydb`.`evaluadores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
