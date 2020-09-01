/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - ci4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ci4`;

/*Table structure for table `komik` */

DROP TABLE IF EXISTS `komik`;

CREATE TABLE `komik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `komik` */

insert  into `komik`(`id`,`judul`,`slug`,`penulis`,`penerbit`,`sampul`,`created_at`,`updated_at`) values 
(1,'Naruto','naruto','masasi','sdfs','/img/naruto.jpeg','2020-08-31 10:35:34',NULL),
(2,'One Piece','one-piece','sagah','asdd','/img/onepiece.jpeg','2020-08-31 10:36:09',NULL),
(3,'Black clover','black-clover','Rian','Gramedia','jahsd','2020-09-01 09:36:10','2020-09-01 09:36:10'),
(4,'asd','asd','asdf','adsf','asd','2020-09-01 09:45:31','2020-09-01 09:45:31'),
(5,'asdasd','asdasd','asdasd','asdasd','asdas','2020-09-01 09:47:21','2020-09-01 09:47:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
