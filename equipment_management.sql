-- -------------------------------------------------------------
-- TablePlus 4.0.2(374)
--
-- https://tableplus.com/
--
-- Database: equipment_management
-- Generation Time: 2021-08-19 12:53:10.5740 AM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `em_machine_shrinkage` (
  `id_machine_shrinkage` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` varchar(5) DEFAULT NULL,
  `overall_frpn` int DEFAULT NULL,
  `qty_machine_shrinkage` int DEFAULT NULL,
  `date_shrinkage` date DEFAULT NULL,
  PRIMARY KEY (`id_machine_shrinkage`),
  UNIQUE KEY `id_machine_shrinkage` (`id_machine_shrinkage`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_create_user` (
  `id_master_create_user` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `password` text,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `picture` text,
  `first_work` date DEFAULT NULL,
  `session` int DEFAULT NULL,
  PRIMARY KEY (`id_master_create_user`),
  UNIQUE KEY `id_master_create_user` (`id_master_create_user`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_detection` (
  `id_master_detection` bigint unsigned NOT NULL AUTO_INCREMENT,
  `detection_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `criteria` varchar(100) DEFAULT NULL,
  `detection_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_detection`),
  UNIQUE KEY `id_master_detection` (`id_master_detection`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_equipment` (
  `id_master_equipment` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_code` varchar(20) DEFAULT NULL,
  `equipment_name` varchar(100) DEFAULT NULL,
  `machine_purchase_date` date DEFAULT NULL,
  `machine_enter_line` date DEFAULT NULL,
  `line` varchar(50) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id_master_equipment`),
  UNIQUE KEY `id_master_equipment` (`id_master_equipment`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_main_process` (
  `id_master_main_process` bigint unsigned NOT NULL AUTO_INCREMENT,
  `main_process_code` varchar(20) DEFAULT NULL,
  `main_process` varchar(100) DEFAULT NULL,
  `max_capacity_daily` int DEFAULT NULL,
  PRIMARY KEY (`id_master_main_process`),
  UNIQUE KEY `id_master_main_process` (`id_master_main_process`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_occurence` (
  `id_master_occurence` bigint unsigned NOT NULL AUTO_INCREMENT,
  `occurence_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `probability_of_damage` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `occurence_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_occurence`),
  UNIQUE KEY `id_master_occurence` (`id_master_occurence`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_severity` (
  `id_master_severity` bigint unsigned NOT NULL AUTO_INCREMENT,
  `severity_type` varchar(20) DEFAULT NULL,
  `severity_effect` varchar(100) DEFAULT NULL,
  `severity_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_severity`),
  UNIQUE KEY `id_master_severity` (`id_master_severity`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_transaction_main_process` (
  `id_transaction_main_process` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` int DEFAULT NULL,
  `id_master_main_process` int DEFAULT NULL,
  `qty_transaction_main_process` int DEFAULT NULL,
  `machine_trouble` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id_transaction_main_process`),
  UNIQUE KEY `id_transaction_main_process` (`id_transaction_main_process`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_transaction_maintenance_machine` (
  `id_transaction_maintenance_machine` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` varchar(5) DEFAULT NULL,
  `occurence_value` int DEFAULT NULL,
  `severity_value` int DEFAULT NULL,
  `detection_value` int DEFAULT NULL,
  `id_transaction_main_process` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `frpn_value` int DEFAULT NULL,
  `fmea_type` varchar(100) DEFAULT NULL,
  `date_maintenance_machine` date DEFAULT NULL,
  `status_maintenance_machine` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id_transaction_maintenance_machine`),
  UNIQUE KEY `id_transaction_maintenance_machine` (`id_transaction_maintenance_machine`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;