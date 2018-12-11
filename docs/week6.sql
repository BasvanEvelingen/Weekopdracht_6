-- MySQL Script generated by MySQL Workbench
-- Tue Dec 11 16:29:34 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT(3) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(16) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `surname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adress` VARCHAR(255) NULL,
  `zipcode` VARCHAR(6) NULL,
  `city` VARCHAR(90) NULL,
  `telephone` VARCHAR(32) NULL,
  `role` VARCHAR(12) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`category` (
  `id` INT(3) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`article` (
  `id` INT(3) NOT NULL,
  `name` VARCHAR(45) NULL,
  `user_id` INT(3) NULL,
  `price` FLOAT NULL,
  `description` TEXT NULL,
  `picture` TEXT NULL,
  `bid_id` INT(3) NULL,
  `create_time` TIMESTAMP NULL,
  `paymethods` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`payment` (
  `id` INT(3) NOT NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`bid`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`bid` (
  `id` INT NOT NULL,
  `article_id` INT(3) NULL,
  `bid` FLOAT NULL,
  `user_id` INT(3) NULL,
  `create_time` TIMESTAMP NULL,
  `article_id1` INT(3) NOT NULL,
  PRIMARY KEY (`id`, `article_id1`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`article_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`article_category` (
  `id` INT(3) NOT NULL,
  `article_id` INT(3) NOT NULL,
  `category_id` INT(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`article_payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`article_payment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `article_id` INT(3) NOT NULL,
  `payment_id` INT(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
