/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - mov_34028791_crude_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mov_34028791_crude_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `mov_34028791_crude_app`;

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `postname` varchar(200) DEFAULT NULL,
  `post_summ` longtext DEFAULT NULL,
  `post_desc` longtext DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `posts` */

insert  into `posts`(`post_id`,`postname`,`post_summ`,`post_desc`) values 
(8,'animals','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum'),
(10,'birdsss','orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  ',' orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  '),
(11,'bear','he printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. ','he printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. he printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. he printing and typesetting industry. Lorem Ipsumorem Ipsum is simply dummy text of the printing and typesetting industry. '),
(20,'4565465','dgvdrgdfg','dgdfgdfg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
