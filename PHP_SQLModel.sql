SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `idUser` INT AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(45) NULL,
  `statut` VARCHAR(45) NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Album` (
  `idAlbum` INT AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `a_slug` VARCHAR(255) NULL,
  `public` TINYINT(1) NULL DEFAULT false,
  `date_create` DATETIME NULL,
  `thumb` VARCHAR(45) NULL,
  `idUser` INT NOT NULL,
  PRIMARY KEY (`idAlbum`),
  INDEX `fk_Album_User1_idx` (`idUser` ASC),
  CONSTRAINT `fk_Album_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `mydb`.`User` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Picture` (
  `idPicture` INT AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `p_slug` VARCHAR(255) NULL,
  `size` INT NULL,
  `width` SMALLINT NULL,
  `height` SMALLINT NULL,
  `date_import` DATETIME NULL,
  `public` TINYINT(1) NULL DEFAULT false,
  `idAlbum` INT NOT NULL,
  PRIMARY KEY (`idPicture`),
  INDEX `fk_Picture_Album_idx` (`idAlbum` ASC),
  CONSTRAINT `fk_Picture_Album`
    FOREIGN KEY (`idAlbum`)
    REFERENCES `mydb`.`Album` (`idAlbum`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Settings` (
  `idSettings` INT AUTO_INCREMENT NOT NULL,
  `thumb_size` SMALLINT NULL,
  `thumb_quality` SMALLINT NULL,
  `order_picture` VARCHAR(45) NULL,
  `order_album` VARCHAR(45) NULL,
  `number` TINYINT NULL,
  PRIMARY KEY (`idSettings`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Original_Picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Original_Picture` (
  `idOriginal_Picture` INT AUTO_INCREMENT NOT NULL,
  `date_capture` DATETIME NULL,
  `idPicture` INT NOT NULL,
  PRIMARY KEY (`idOriginal_Picture`, `idPicture`),
  INDEX `fk_Original_Picture_Picture1_idx` (`idPicture` ASC),
  CONSTRAINT `fk_Original_Picture_Picture1`
    FOREIGN KEY (`idPicture`)
    REFERENCES `mydb`.`Picture` (`idPicture`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Modified_Picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Modified_Picture` (
  `idModified_Picture` INT AUTO_INCREMENT NOT NULL,
  `idPicture` INT NOT NULL,
  `date_modif` DATETIME NULL,
  `filter_name` VARCHAR(45) NULL,
  PRIMARY KEY (`idModified_Picture`, `idPicture`),
  INDEX `fk_Modified_Picture_Picture1_idx` (`idPicture` ASC),
  CONSTRAINT `fk_Modified_Picture_Picture1`
    FOREIGN KEY (`idPicture`)
    REFERENCES `mydb`.`Picture` (`idPicture`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comments` (
  `idComments` INT AUTO_INCREMENT NOT NULL,
  `comment` TEXT NULL,
  `date_publish` DATETIME NULL,
  `idUser` INT NOT NULL,
  `idPicture` INT NOT NULL,
  PRIMARY KEY (`idComments`),
  INDEX `fk_Comments_User1_idx` (`idUser` ASC),
  INDEX `fk_Comments_Picture1_idx` (`idPicture` ASC),
  CONSTRAINT `fk_Comments_User1`
    FOREIGN KEY (`idUser`)
    REFERENCES `mydb`.`User` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Comments_Picture1`
    FOREIGN KEY (`idPicture`)
    REFERENCES `mydb`.`Picture` (`idPicture`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
