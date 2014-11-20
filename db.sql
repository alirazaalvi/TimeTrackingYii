/*
SQLyog Ultimate v8.71 
MySQL - 5.5.8-log : Database - webapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webapp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webapp`;

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) DEFAULT NULL,
  `client_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `client` */

insert  into `client`(`id`,`client_name`,`client_description`) values (1,'Client 1','Client number 1'),(2,'Client 2','Client number 2');

/*Table structure for table `logged_time` */

DROP TABLE IF EXISTS `logged_time`;

CREATE TABLE `logged_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `logged_day` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `logged_time` */

insert  into `logged_time`(`id`,`user_id`,`project_id`,`client_id`,`logged_day`,`hours`) values (1,1,2,2,'2013-02-20',14),(2,1,1,2,'2013-02-13',16),(3,1,1,1,'2013-01-08',13),(4,1,1,1,'2013-01-19',14),(5,1,1,1,'2013-03-14',13),(6,1,1,1,'2013-02-20',9),(7,1,1,1,'2013-02-13',1),(8,1,1,1,'2013-02-13',16),(9,1,1,1,'2013-02-14',1),(10,1,1,1,'2013-02-20',1),(11,2,1,1,'2013-02-20',16),(12,2,1,1,'2013-02-20',16),(13,1,1,1,'2013-02-20',5);

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) DEFAULT NULL,
  `project_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`id`,`project_title`,`project_description`) values (1,'Project 1','Project number 1'),(2,'Project 2','Project number 2');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `pass` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`pass`) values (1,'ali','ali'),(2,'aliraza','aliraza');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
