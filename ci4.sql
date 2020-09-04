/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.21-0ubuntu0.20.04.4 : Database - ci4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `ci4`;

/*Table structure for table `komik` */

DROP TABLE IF EXISTS `komik`;

CREATE TABLE `komik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `komik` */

insert  into `komik`(`id`,`judul`,`slug`,`penulis`,`penerbit`,`sampul`,`created_at`,`updated_at`) values 
(1,'Naruto','naruto','masasi','sdfs','onepiece.jpeg','2020-08-31 10:35:34',NULL),
(2,'One Piece','one-piece','sagah','asdd','naruto.jpeg','2020-08-31 10:36:09',NULL),
(3,'Black clover','black-clover','Rian f','Gramedia','default.jpg','2020-09-01 09:36:10','2020-09-02 01:43:48'),
(12,'ultramen','ultramen','dasd','adasd','ultramen.jpeg','2020-09-03 00:38:04','2020-09-03 00:38:04'),
(13,'Kerahan','kerahan','asdas','dasdasd','1599184563_3910c614ccdcb2a18aac.jpeg','2020-09-03 00:45:30','2020-09-03 20:56:03'),
(14,'asdasd','asdasd','asdasd','asdasd','default.jpg','2020-09-03 00:51:48','2020-09-03 00:51:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
