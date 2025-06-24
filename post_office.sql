-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.4.32-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных postoffice
CREATE DATABASE IF NOT EXISTS `postoffice` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `postoffice`;

-- Дамп структуры для таблица postoffice.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `clientID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientLastName` varchar(50) NOT NULL,
  `clientFirstName` varchar(20) NOT NULL,
  `clientPatronymic` varchar(20) NOT NULL,
  `clientPassport` varchar(20) NOT NULL,
  `clientPhone` varchar(20) NOT NULL,
  PRIMARY KEY (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.clients: ~3 rows (приблизительно)
INSERT INTO `clients` (`clientID`, `clientLastName`, `clientFirstName`, `clientPatronymic`, `clientPassport`, `clientPhone`) VALUES
	(2, 'Петров', 'Петр', 'Петрович', '22 22 222222', '+7(888)888-88-88'),
	(3, 'Макаров', 'Макар', 'Макарович', '66 66 666666', '+7(999)777-77-77'),
	(10, 'Иванов', 'Иван', 'Иванович', '44 44 444666', '+7(968)546-76-23');

-- Дамп структуры для процедура postoffice.client_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `client_del_by_id_proc`(
	IN `client_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
START TRANSACTION;
IF EXISTS (
    SELECT 1
    FROM orders
    WHERE senderID = client_id OR recipientID = client_id
) THEN
    ROLLBACK;
    SET result = 'ROLLBACK';
ELSE
    DELETE FROM clients
    WHERE clientID = client_id;
    COMMIT;
    SET result = 'COMMIT';
END IF;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.corresptype
CREATE TABLE IF NOT EXISTS `corresptype` (
  `correspTypeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `typeName` varchar(50) NOT NULL,
  PRIMARY KEY (`correspTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.corresptype: ~3 rows (приблизительно)
INSERT INTO `corresptype` (`correspTypeID`, `typeName`) VALUES
	(1, 'Письмо'),
	(4, 'Посылка'),
	(6, 'Бандероль');

-- Дамп структуры для процедура postoffice.corresp_type_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `corresp_type_del_by_id_proc`(
	IN `corresp_type_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
START TRANSACTION;
IF EXISTS (
    SELECT 1
    FROM orders
    WHERE correspTypeID = corresp_type_id
) THEN
    ROLLBACK;
    SET result = 'ROLLBACK';
ELSE
    DELETE FROM corresptype
    WHERE correspTypeID = corresp_type_id;
    COMMIT;
    SET result = 'COMMIT';
END IF;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `departmentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `departmentRegion` varchar(50) NOT NULL,
  `departmentCityOrVillage` varchar(50) NOT NULL,
  `departmentAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.departments: ~3 rows (приблизительно)
INSERT INTO `departments` (`departmentID`, `departmentRegion`, `departmentCityOrVillage`, `departmentAddress`) VALUES
	(2, 'Донецкая Народная Республика', 'г. Шахтерск', 'ул. Ленина, д.18'),
	(5, 'Донецкая Народная Республика', 'пос. Садовое', 'ул. Победы, д. 1'),
	(6, 'Донецкая Народная Республика', 'г. Донецк', 'ул. Артема, д. 72');

-- Дамп структуры для процедура postoffice.department_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `department_del_by_id_proc`(
	IN `department_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
  DECLARE order_count INT;
  DECLARE worker_count INT;
  DECLARE tab_part_order_count INT;

  START TRANSACTION;

  SELECT COUNT(*) INTO order_count
  FROM orders
  WHERE departmentID = department_id;

  SELECT COUNT(*) INTO worker_count
  FROM workers
  WHERE departmentID = department_id;

  SELECT COUNT(*) INTO tab_part_order_count
  FROM tabpartorders
  WHERE departmentID = department_id;

  IF order_count = 0 AND worker_count = 0 AND tab_part_order_count = 0 THEN
    DELETE FROM departments
    WHERE departmentID = department_id;
    COMMIT;
    SET result = 'COMMIT';
  ELSE
    ROLLBACK;
    SET result = 'ROLLBACK';
  END IF;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workerID` int(11) unsigned NOT NULL,
  `senderID` int(11) unsigned NOT NULL,
  `correspTypeID` int(11) unsigned NOT NULL,
  `correspWeight` float unsigned NOT NULL,
  `recipientID` int(11) unsigned NOT NULL,
  `departmentID` int(11) unsigned NOT NULL,
  `cost` float unsigned NOT NULL,
  `regDate` date NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `workerID` (`workerID`),
  KEY `recipientID` (`recipientID`),
  KEY `departmentID` (`departmentID`),
  KEY `correspID` (`correspTypeID`) USING BTREE,
  KEY `senderID` (`senderID`),
  CONSTRAINT `FK_orders_clients` FOREIGN KEY (`senderID`) REFERENCES `clients` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_orders_clients_2` FOREIGN KEY (`recipientID`) REFERENCES `clients` (`clientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_orders_corresptype` FOREIGN KEY (`correspTypeID`) REFERENCES `corresptype` (`correspTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_orders_departments` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_orders_workers` FOREIGN KEY (`workerID`) REFERENCES `workers` (`workerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.orders: ~2 rows (приблизительно)
INSERT INTO `orders` (`orderID`, `workerID`, `senderID`, `correspTypeID`, `correspWeight`, `recipientID`, `departmentID`, `cost`, `regDate`) VALUES
	(32, 11, 10, 1, 0.05, 10, 6, 60, '2025-06-16'),
	(34, 11, 2, 4, 1.56, 3, 6, 123, '2025-06-24');

-- Дамп структуры для процедура postoffice.orders_info
DELIMITER //
CREATE PROCEDURE `orders_info`()
BEGIN
SELECT o.orderID,
w_d.workerLastName, w_d.workerFirstName, w_d.workerPatronymic, w_d.departmentRegion AS A_depRegion, w_d.departmentCityOrVillage AS A_depCityOrVillage,
w_d.departmentAddress AS A_depAddress,
s.clientLastName AS senderLastName, s.clientFirstName AS senderFirstName, s.clientPatronymic AS senderPatronymic, s.clientPhone AS senderPhone,
corresptype.typeName,
o.correspWeight,
r.clientLastName AS recipientLastName, r.clientFirstName AS recipientFirstName, r.clientPatronymic AS recipientPatronymic, r.clientPhone AS recipientPhone,
d_o.departmentRegion AS B_depRegion, d_o.departmentCityOrVillage AS B_depCityOrVillage, d_o.departmentAddress AS B_depAddress, o.cost, o.regDate
FROM (SELECT workers.workerID, workers.workerLastName, workers.workerFirstName, workers.workerPatronymic,
departments.departmentRegion, departments.departmentCityOrVillage, departments.departmentAddress
FROM workers JOIN departments ON departments.departmentID = workers.departmentID) AS w_d JOIN orders AS o ON o.workerID = w_d.workerID JOIN clients AS s ON s.clientID = o.senderID
JOIN corresptype ON corresptype.correspTypeID = o.correspTypeID
JOIN clients AS r ON r.clientID = o.recipientID JOIN departments AS d_o ON d_o.departmentID = o.departmentID
ORDER BY o.orderID DESC;
END//
DELIMITER ;

-- Дамп структуры для процедура postoffice.order_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `order_del_by_id_proc`(
	IN `order_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
START TRANSACTION;
IF EXISTS (
    SELECT 1
    FROM tabpartorders
    WHERE orderID = order_id
) THEN
    ROLLBACK;
    SET result = 'ROLLBACK';
ELSE
    DELETE FROM orders
    WHERE orderID = order_id;
    COMMIT;
    SET result = 'COMMIT';
END IF;
END//
DELIMITER ;

-- Дамп структуры для процедура postoffice.order_search
DELIMITER //
CREATE PROCEDURE `order_search`(
	IN `trackCode` INT
)
BEGIN
SELECT o.orderID,
w_d.workerLastName, w_d.workerFirstName, w_d.workerPatronymic, w_d.departmentRegion AS A_depRegion, w_d.departmentCityOrVillage AS A_depCityOrVillage,
w_d.departmentAddress AS A_depAddress,
s.clientLastName AS senderLastName, s.clientFirstName AS senderFirstName, s.clientPatronymic AS senderPatronymic, s.clientPhone AS senderPhone,
corresptype.typeName,
o.correspWeight,
r.clientLastName AS recipientLastName, r.clientFirstName AS recipientFirstName, r.clientPatronymic AS recipientPatronymic, r.clientPhone AS recipientPhone,
d_o.departmentRegion AS B_depRegion, d_o.departmentCityOrVillage AS B_depCityOrVillage, d_o.departmentAddress AS B_depAddress, o.cost, o.regDate
FROM (SELECT workers.workerID, workers.workerLastName, workers.workerFirstName, workers.workerPatronymic,
departments.departmentRegion, departments.departmentCityOrVillage, departments.departmentAddress
FROM workers JOIN departments ON departments.departmentID = workers.departmentID) AS w_d JOIN orders AS o ON o.workerID = w_d.workerID JOIN clients AS s ON s.clientID = o.senderID
JOIN corresptype ON corresptype.correspTypeID = o.correspTypeID
JOIN clients AS r ON r.clientID = o.recipientID JOIN departments AS d_o ON d_o.departmentID = o.departmentID
WHERE o.orderID = trackCode;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.statusoforders
CREATE TABLE IF NOT EXISTS `statusoforders` (
  `statusID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `statusName` varchar(50) NOT NULL,
  PRIMARY KEY (`statusID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.statusoforders: ~5 rows (приблизительно)
INSERT INTO `statusoforders` (`statusID`, `statusName`) VALUES
	(2, 'Прибыл в пункт назначения'),
	(3, 'В пути'),
	(4, 'Остановлен в промежуточном отделении'),
	(5, 'Ожидает отправки'),
	(6, 'Выдан получателю');

-- Дамп структуры для процедура postoffice.status_of_order_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `status_of_order_del_by_id_proc`(
	IN `status_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
START TRANSACTION;
IF EXISTS (
    SELECT 1
    FROM tabpartorders
    WHERE statusID = status_id
) THEN
    ROLLBACK;
    SET result = 'ROLLBACK';
ELSE
    DELETE FROM statusoforders
    WHERE statusID = status_id;
    COMMIT;
    SET result = 'COMMIT';
END IF;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.tabpartorders
CREATE TABLE IF NOT EXISTS `tabpartorders` (
  `tabPartOrderID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderID` int(11) unsigned NOT NULL,
  `statusID` int(11) unsigned NOT NULL,
  `departmentID` int(11) unsigned NOT NULL,
  `dateOfFix` date NOT NULL,
  PRIMARY KEY (`tabPartOrderID`),
  KEY `orderID` (`orderID`),
  KEY `statusID` (`statusID`),
  KEY `departmentID` (`departmentID`),
  CONSTRAINT `FK_tabpartorders_departments` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tabpartorders_orders` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tabpartorders_statusoforders` FOREIGN KEY (`statusID`) REFERENCES `statusoforders` (`statusID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.tabpartorders: ~0 rows (приблизительно)
INSERT INTO `tabpartorders` (`tabPartOrderID`, `orderID`, `statusID`, `departmentID`, `dateOfFix`) VALUES
	(2, 34, 5, 5, '2025-06-24'),
	(3, 34, 3, 5, '2025-06-24'),
	(4, 34, 4, 2, '2025-06-24'),
	(5, 34, 3, 2, '2025-06-24'),
	(6, 34, 2, 6, '2025-06-25'),
	(7, 34, 6, 6, '2025-06-26');

-- Дамп структуры для процедура postoffice.tab_part_orders_info
DELIMITER //
CREATE PROCEDURE `tab_part_orders_info`()
BEGIN
SELECT tabpartorders.tabPartOrderID, tabpartorders.orderID, statusoforders.statusName, departments.departmentRegion, departments.departmentCityOrVillage, departments.departmentAddress, tabpartorders.dateOfFix
FROM tabpartorders JOIN statusoforders ON statusoforders.statusID = tabpartorders.statusID JOIN departments ON departments.departmentID = tabpartorders.departmentID
ORDER BY tabpartorders.tabPartOrderID DESC;
END//
DELIMITER ;

-- Дамп структуры для процедура postoffice.tab_part_order_search
DELIMITER //
CREATE PROCEDURE `tab_part_order_search`(
	IN `trackCode` INT
)
BEGIN
SELECT tabpartorders.tabPartOrderID, tabpartorders.orderID, statusoforders.statusName, departments.departmentRegion, departments.departmentCityOrVillage, departments.departmentAddress, tabpartorders.dateOfFix
FROM tabpartorders JOIN statusoforders ON statusoforders.statusID = tabpartorders.statusID JOIN departments ON departments.departmentID = tabpartorders.departmentID
WHERE tabpartorders.orderID = trackCode
ORDER BY tabpartorders.tabPartOrderID DESC;
END//
DELIMITER ;

-- Дамп структуры для таблица postoffice.workers
CREATE TABLE IF NOT EXISTS `workers` (
  `workerID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `workerLastName` varchar(50) NOT NULL,
  `workerFirstName` varchar(20) NOT NULL,
  `workerPatronymic` varchar(20) NOT NULL,
  `gender` enum('М','Ж') NOT NULL,
  `dateOfBirth` date NOT NULL,
  `departmentID` int(11) unsigned NOT NULL,
  `workerPost` varchar(50) NOT NULL,
  PRIMARY KEY (`workerID`),
  KEY `departmentID` (`departmentID`),
  CONSTRAINT `FK_workers_departments` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`departmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Дамп данных таблицы postoffice.workers: ~2 rows (приблизительно)
INSERT INTO `workers` (`workerID`, `workerLastName`, `workerFirstName`, `workerPatronymic`, `gender`, `dateOfBirth`, `departmentID`, `workerPost`) VALUES
	(11, 'Петрова', 'Анна', 'Васильевна', 'Ж', '1980-08-10', 5, 'Оператор'),
	(16, 'Антонова', 'Галина', 'Алексеевна', 'Ж', '1983-07-13', 2, 'Оператор');

-- Дамп структуры для процедура postoffice.worker_del_by_id_proc
DELIMITER //
CREATE PROCEDURE `worker_del_by_id_proc`(
	IN `worker_id` INT,
	OUT `result` VARCHAR(50)
)
BEGIN
START TRANSACTION;
IF EXISTS (
    SELECT 1
    FROM orders
    WHERE workerID = worker_id
) THEN
    ROLLBACK;
    SET result = 'ROLLBACK';
ELSE
    DELETE FROM workers
    WHERE workerID = worker_id;
    COMMIT;
    SET result = 'COMMIT';
END IF;
END//
DELIMITER ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
