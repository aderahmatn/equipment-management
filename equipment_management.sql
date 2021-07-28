-- -------------------------------------------------------------
-- TablePlus 3.12.2(358)
--
-- https://tableplus.com/
--
-- Database: equipment_management
-- Generation Time: 2021-07-28 1:14:45.0750 PM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_detection` (
  `id_master_detection` bigint unsigned NOT NULL AUTO_INCREMENT,
  `detection_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `criteria` varchar(100) DEFAULT NULL,
  `detection_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_detection`),
  UNIQUE KEY `id_master_detection` (`id_master_detection`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_main_process` (
  `id_master_main_process` bigint unsigned NOT NULL AUTO_INCREMENT,
  `main_process_code` varchar(20) DEFAULT NULL,
  `main_process` varchar(100) DEFAULT NULL,
  `max_capacity_daily` int DEFAULT NULL,
  PRIMARY KEY (`id_master_main_process`),
  UNIQUE KEY `id_master_main_process` (`id_master_main_process`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_occurence` (
  `id_master_occurence` bigint unsigned NOT NULL AUTO_INCREMENT,
  `occurence_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `probability_of_damage` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `occurence_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_occurence`),
  UNIQUE KEY `id_master_occurence` (`id_master_occurence`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_master_severity` (
  `id_master_severity` bigint unsigned NOT NULL AUTO_INCREMENT,
  `severity_type` varchar(20) DEFAULT NULL,
  `severity_effect` varchar(100) DEFAULT NULL,
  `severity_value` int DEFAULT NULL,
  `rangkings` int DEFAULT NULL,
  PRIMARY KEY (`id_master_severity`),
  UNIQUE KEY `id_master_severity` (`id_master_severity`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_transaction_main_process` (
  `id_transaction_main_process` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` int DEFAULT NULL,
  `id_master_main_process` int DEFAULT NULL,
  `qty_transaction_main_process` int DEFAULT NULL,
  `machine_trouble` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id_transaction_main_process`),
  UNIQUE KEY `id_transaction_main_process` (`id_transaction_main_process`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_transaction_maintenance_machine` (
  `id_transaction_maintenance_machine` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` varchar(5) DEFAULT NULL,
  `id_master_occurence` varchar(5) DEFAULT NULL,
  `id_master_severity` varchar(5) DEFAULT NULL,
  `id_master_detection` varchar(5) DEFAULT NULL,
  `frpn_value` int DEFAULT NULL,
  `fmea_type` varchar(100) DEFAULT NULL,
  `date_maintenance_machine` date DEFAULT NULL,
  PRIMARY KEY (`id_transaction_maintenance_machine`),
  UNIQUE KEY `id_transaction_maintenance_machine` (`id_transaction_maintenance_machine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `em_transaction_maintenance_machine_results` (
  `id_transaction_maintenance_machine_results` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_master_equipment` varchar(5) DEFAULT NULL,
  `machine_trouble` varchar(5) DEFAULT NULL,
  `fmea_type` varchar(50) DEFAULT NULL,
  `date_maintenance_machine` date DEFAULT NULL,
  `machine_maintenance_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_transaction_maintenance_machine_results`),
  UNIQUE KEY `id_transaction_maintenance_machine_results` (`id_transaction_maintenance_machine_results`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `em_master_create_user` (`id_master_create_user`, `dept_code`, `nik`, `password`, `full_name`, `email`, `position`, `division`, `picture`, `first_work`) VALUES
('7', 'a002', '46899', '21232f297a57a5a743894a0e4a801fc3', 'ade rahmat nurdiyana', 'nurdiyana.ade@gmail.com', 'staff', 'engineering', 'pic-60f9c75feeaba.JPG', '2016-10-30'),
('8', 'a004', '43218', '21232f297a57a5a743894a0e4a801fc3', 'james bond', 'james.bond@gmail.com', 'staff', 'accounting', 'pic-60f9d315c8842.jpg', '2021-07-08');

INSERT INTO `em_master_detection` (`id_master_detection`, `detection_type`, `criteria`, `detection_value`, `rangkings`) VALUES
('3', 'G9KzqNmDcb', 'MPo3pPqqDB', '140323', '300695'),
('4', '5JwBqe256v', 'vn7POMoLyP', '767904', '894042'),
('5', 'MhIEwVbmTC', 'SpgAlw1bMd', '441696', '246035'),
('6', 'hula', 'hup', '982731', '1234');

INSERT INTO `em_master_equipment` (`id_master_equipment`, `machine_code`, `equipment_name`, `machine_purchase_date`, `machine_enter_line`, `line`, `qty`, `created_date`) VALUES
('3', 'mc002', 'OkkfBe7dgK', '2021-07-07', '2021-07-20', 'gxzxtK7ntv', '842061', '2021-07-20'),
('5', 'c8urcNqlnw', 'hERp0EOg4F', '2021-07-07', '2021-07-20', 'kcAWwVGCxZ', '77', '2021-07-23');

INSERT INTO `em_master_main_process` (`id_master_main_process`, `main_process_code`, `main_process`, `max_capacity_daily`) VALUES
('1', 'mc002', 'painting', '29'),
('3', 'P8UkYqLR7H', '4AmySIyNr5', '55333'),
('4', 'KJaz7bhdO7', 'Rm5TGjrLgJ', '648911');

INSERT INTO `em_master_occurence` (`id_master_occurence`, `occurence_type`, `probability_of_damage`, `occurence_value`, `rangkings`) VALUES
('3', 'wili', 'dust', '12345', '1234'),
('4', 'DkGK7src4j', 'Pv31B19lMJ', '166966', '976914');

INSERT INTO `em_master_severity` (`id_master_severity`, `severity_type`, `severity_effect`, `severity_value`, `rangkings`) VALUES
('3', 'wingko', 'TmMyY7v0ei', '974513', '2100'),
('4', 'G8EOcanidx', 'bISua8YJ44', '525959', '54068');

INSERT INTO `em_transaction_main_process` (`id_transaction_main_process`, `id_master_equipment`, `id_master_main_process`, `qty_transaction_main_process`, `machine_trouble`, `created_date`) VALUES
('1', '3', '1', '12', 'kabel power putus', '2021-07-28');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;