-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия на сървъра:            10.1.21-MariaDB - mariadb.org binary distribution
-- ОС на сървъра:                Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дъмп структура за таблица exam-framework-mini.accommodation_types
CREATE TABLE IF NOT EXISTS `accommodation_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица exam-framework-mini.accommodation_types: ~3 rows (approximately)
DELETE FROM `accommodation_types`;
/*!40000 ALTER TABLE `accommodation_types` DISABLE KEYS */;
INSERT INTO `accommodation_types` (`id`, `name`) VALUES
	(1, 'hotel'),
	(2, 'hostel'),
	(3, 'guest house');
/*!40000 ALTER TABLE `accommodation_types` ENABLE KEYS */;

-- Дъмп структура за таблица exam-framework-mini.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accommodation_type_id` int(10) unsigned NOT NULL,
  `children` int(10) unsigned NOT NULL DEFAULT '0',
  `adults` int(10) unsigned NOT NULL DEFAULT '0',
  `rooms` int(10) unsigned NOT NULL DEFAULT '0',
  `check_in_date` datetime NOT NULL,
  `check_out_date` datetime NOT NULL,
  `lift_pass` int(11) NOT NULL DEFAULT '0',
  `ski_instruktor` int(11) NOT NULL DEFAULT '0',
  `is_deleted` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_reservations_accommodation_types` (`accommodation_type_id`),
  CONSTRAINT `FK_reservations_accommodation_types` FOREIGN KEY (`accommodation_type_id`) REFERENCES `accommodation_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дъмп данни за таблица exam-framework-mini.reservations: ~2 rows (approximately)
DELETE FROM `reservations`;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `accommodation_type_id`, `children`, `adults`, `rooms`, `check_in_date`, `check_out_date`, `lift_pass`, `ski_instruktor`, `is_deleted`) VALUES
	(1, 'Ivan', 'Petrov', '123456', 'asdasd@asd.com', 1, 5, 6, 7, '2017-03-15 00:00:00', '2017-03-15 00:00:00', 1, 0, NULL),
	(2, 'Videlin', 'Donchev', '0895440303', 'info@videlin.be', 3, 1, 2, 1, '2017-03-03 00:00:00', '2017-03-03 00:00:00', 0, 1, NULL),
	(3, 'Николай', 'Колев Petrow', '35989632147', 'mail@mail.me', 1, 1, 5, 1, '2017-03-11 00:00:00', '2017-03-11 00:00:00', 1, 0, NULL);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
