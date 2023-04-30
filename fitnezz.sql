/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - fitnezz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fitnezz` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fitnezz`;

/*Table structure for table `program` */

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `programid` bigint(10) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(50) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `trainerid` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`programid`),
  KEY `fk_trainer_id` (`trainerid`),
  CONSTRAINT `fk_trainer_id` FOREIGN KEY (`trainerid`) REFERENCES `trainer` (`trainerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `program` */

/*Table structure for table `programtype` */

DROP TABLE IF EXISTS `programtype`;

CREATE TABLE `programtype` (
  `programid` bigint(10) NOT NULL,
  `programtypeid` bigint(10) NOT NULL,
  `programtypename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`programid`,`programtypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `programtype` */

/*Table structure for table `trainer` */

DROP TABLE IF EXISTS `trainer`;

CREATE TABLE `trainer` (
  `trainerid` bigint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`trainerid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trainer` */

insert  into `trainer`(`trainerid`,`username`,`password`) values 
(1,'bojana','bojana'),
(2,'ognjen','ognjen123'),
(3,'kristina','kristina123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
