-- -------------------------------------------------------------
-- TablePlus 4.0.2(374)
--
-- https://tableplus.com/
--
-- Database: equipment_management
-- Generation Time: 2021-08-04 3:38:10.4890 AM
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
  PRIMARY KEY (`id_machine_shrinkage`),
  UNIQUE KEY `id_machine_shrinkage` (`id_machine_shrinkage`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  PRIMARY KEY (`id_master_create_user`),
  UNIQUE KEY `id_master_create_user` (`id_master_create_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `em_machine_shrinkage` (`id_machine_shrinkage`, `id_master_equipment`, `overall_frpn`, `qty_machine_shrinkage`) VALUES
(8, '7', 497000, 5);

INSERT INTO `em_master_create_user` (`id_master_create_user`, `dept_code`, `nik`, `password`, `full_name`, `email`, `position`, `division`, `picture`, `first_work`) VALUES
(7, 'a002', '46899', '21232f297a57a5a743894a0e4a801fc3', 'ade rahmat nurdiyana', 'nurdiyana.ade@gmail.com', 'staff', 'manager', 'pic-60f9c75feeaba.JPG', '2016-10-30'),
(8, 'a004', '43218', '21232f297a57a5a743894a0e4a801fc3', 'james bond', 'james.bond@gmail.com', 'staff', 'accounting', 'pic-60f9d315c8842.jpg', '2021-07-08'),
(24, 'ygoeyRUGHI', '2jHBH5T1Az', '21232f297a57a5a743894a0e4a801fc3', 'V3Ea3h9CMu', '8fcgz@kc6p.com', 'RbAG8UMTR9', 'admin', 'pic-610123867cc4b.jpg', '2021-07-08');

INSERT INTO `em_master_detection` (`id_master_detection`, `detection_type`, `criteria`, `detection_value`, `rangkings`) VALUES
(7, 'cukup', '70', 70, 2),
(8, 'baik', '100', 100, 1);

INSERT INTO `em_master_equipment` (`id_master_equipment`, `machine_code`, `equipment_name`, `machine_purchase_date`, `machine_enter_line`, `line`, `qty`, `created_date`) VALUES
(7, 'MC001', 'juki sewing', '2021-07-01', '2021-07-10', 'adidas', 20, '2021-07-31'),
(8, 'MC002', 'brother pq1500l', '2021-07-05', '2021-07-20', 'puma', 12, '2021-07-31'),
(9, 'mc003', 'singer wl200', '2021-07-18', '2021-07-30', 'adidas', 30, '2021-07-31');

INSERT INTO `em_master_main_process` (`id_master_main_process`, `main_process_code`, `main_process`, `max_capacity_daily`) VALUES
(6, 'P001', 'cutting', 150),
(7, 'p002', 'sewing', 130),
(8, 'p003', 'outsole', 145);

INSERT INTO `em_master_occurence` (`id_master_occurence`, `occurence_type`, `probability_of_damage`, `occurence_value`, `rangkings`) VALUES
(5, 'berbahaya', '100', 100, 1),
(6, 'cukup berbahaya', '70', 70, 2);

INSERT INTO `em_master_severity` (`id_master_severity`, `severity_type`, `severity_effect`, `severity_value`, `rangkings`) VALUES
(6, 'cukup ', '70', 70, 2),
(7, 'sangat', '100', 100, 1);

INSERT INTO `em_transaction_main_process` (`id_transaction_main_process`, `id_master_equipment`, `id_master_main_process`, `qty_transaction_main_process`, `machine_trouble`, `created_date`) VALUES
(4, 7, 7, 50, 'oli bocor', '2021-07-31'),
(5, 8, 7, 80, 'kabel putus', '2021-07-31'),
(6, 7, 7, 50, 'fan belt putus', '2021-07-31');

INSERT INTO `em_transaction_maintenance_machine` (`id_transaction_maintenance_machine`, `id_master_equipment`, `occurence_value`, `severity_value`, `detection_value`, `id_transaction_main_process`, `frpn_value`, `fmea_type`, `date_maintenance_machine`, `status_maintenance_machine`) VALUES
(6, '8', 100, 70, 100, '5', 700000, 'test', '2021-07-15', 'not fixed yet'),
(7, '7', 100, 70, 0, '4', 7000, 'none', '2021-08-01', 'not fixed yet'),
(8, '7', 70, 100, 70, '6', 490000, 'none', '2021-08-03', 'not fixed yet');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;