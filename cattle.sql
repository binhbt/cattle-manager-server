/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.10-MariaDB : Database - cattle_manager
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cattles` */

DROP TABLE IF EXISTS `cattles`;

CREATE TABLE `cattles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `blood` tinytext COLLATE utf8_bin,
  `weight` bigint(20) DEFAULT '0' COMMENT '10e6',
  `buy_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `month_old` int(11) DEFAULT '0',
  `cost` bigint(20) DEFAULT '0' COMMENT '10e6',
  `status` tinyint(4) DEFAULT '0',
  `sale_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `sale_price` bigint(20) DEFAULT '0' COMMENT '10e6',
  `sale_status` tinyint(4) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `cattles` */

insert  into `cattles`(`id`,`name`,`description`,`blood`,`weight`,`buy_date`,`month_old`,`cost`,`status`,`sale_date`,`sale_price`,`sale_status`,`user_id`,`modified`) values (13,'#QV01','mua cho nham','BBB',250,'0000-00-00 00:00:00',8,0,0,'0000-00-00 00:00:00',0,0,2,'2016-03-30 18:01:46'),(14,'#QV02','mua cho nham','BBB',250,'0000-00-00 00:00:00',8,0,0,'0000-00-00 00:00:00',0,0,2,'2016-03-30 18:01:56'),(15,'can thang 3','can thang 3',NULL,950,'2016-03-31 06:47:37',0,0,0,'0000-00-00 00:00:00',0,0,2,'2016-03-31 06:47:37'),(16,'can thang 3','can thang 3',NULL,950,'2016-03-31 06:47:49',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-03-31 06:47:49'),(17,'can thang 3','can thang 4',NULL,950,'2016-03-31 06:47:54',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-03-31 06:47:54'),(18,'xxx','can thang 4',NULL,950,'2016-04-01 06:17:45',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 06:17:45'),(19,'xxx','can thang 4',NULL,950,'2016-03-30 23:47:54',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 06:19:19'),(20,'xxx','can thang 4',NULL,950,'2016-03-30 17:00:00',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 06:20:01'),(21,'uffyfyfdy','3916-04-01 12:00:00','ffchf',853538,'0000-00-00 00:00:00',3535525,85535,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 08:47:38'),(22,'#qv10','bat tai ba vi','B.B.B(BBB)(3B)',200,'0000-00-00 00:00:00',6,18000000,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 08:51:36'),(23,'sdsdfs','sdfds','sdfds',350,'2016-04-01 08:53:00',0,0,0,'2016-04-01 08:53:00',0,0,1,'2016-04-01 08:57:22'),(24,'@BV012','Mua tai ba vi',NULL,950,'2016-03-30 17:00:00',0,0,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 09:14:08'),(25,'gggggg','gggh','bbb',1234,'2016-03-30 17:00:00',12,12,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 09:22:02'),(26,'tttt','tttt','bbhb',5698,'0000-00-00 00:00:00',586,8666,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 09:24:52'),(27,'oooob','ooooo','bb',98,'2016-04-01 05:00:00',86665,96,0,'0000-00-00 00:00:00',0,0,1,'2016-04-01 09:27:37');

/*Table structure for table `costs` */

DROP TABLE IF EXISTS `costs`;

CREATE TABLE `costs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_bin,
  `description` text COLLATE utf8_bin,
  `cost` bigint(20) DEFAULT '0' COMMENT '10e6',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `costs` */

insert  into `costs`(`id`,`name`,`description`,`cost`,`date`,`user_id`,`modified`,`status`) values (3,'Mua ngo','mua cua ba ham 20tan',10,'0000-00-00 00:00:00',1,'2016-03-30 19:46:59',0),(4,'Mua ngo','mua cua ba ham 22tan',10,'2016-03-30 19:48:10',1,'2016-03-30 19:48:10',0),(5,'mua than ngo','mua 10 mau than ngo',2000000,'2016-04-01 12:59:26',1,'2016-04-01 12:59:26',0),(6,'# ▒▒▒▒▒▒▒▒▒▒▒▒▒▒','Xe x ▒▒▒▒▒▒▒▒▒▒▒▒▒▒',1000000,'2016-04-01 05:00:00',1,'2016-04-01 15:14:07',0),(7,'rfr','f',44,'2016-04-01 05:00:00',1,'2016-04-01 20:17:05',0);

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_bin,
  `cattle_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `cost` bigint(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `events` */

insert  into `events`(`id`,`name`,`cattle_id`,`user_id`,`description`,`cost`,`date`,`modified`,`status`) values (2,'Mua cam ngo',13,2,'vo beo',1001,'2016-03-30 20:04:08','2016-03-30 20:04:08',0),(3,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 14:55:07',0),(4,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 14:58:00',0),(5,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 14:58:24',0),(6,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 14:58:53',0),(7,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 14:59:58',0),(8,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:00:01',0),(9,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:00:10',0),(10,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:05:53',0),(11,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:06:11',0),(12,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:06:17',0),(13,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:07:30',0),(14,'Tiem phong',14,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:07:30',0),(15,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:07:53',0),(16,'Tiem phong',14,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:07:53',0),(17,'Tiem phong',13,1,'Mua tai ba vi',NULL,'2016-03-30 17:00:00','2016-04-01 15:14:55',0),(18,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒',13,1,'DH ▒▒▒▒▒▒▒▒▒▒▒▒▒▒',123456,'2016-09-01 05:00:00','2016-04-01 15:20:28',0),(19,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒',13,1,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒',5698,'2016-04-01 05:00:00','2016-04-01 15:21:29',0),(20,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒',14,1,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒',5698,'2016-04-01 05:00:00','2016-04-01 15:21:29',0);

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_bin,
  `status` tinyint(4) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `messages` */

insert  into `messages`(`id`,`message`,`status`,`modified`) values (1,'User is not permission',-1,'2016-03-30 07:59:08'),(2,'User is not permission',-1,'2016-03-30 08:02:11'),(3,'User is not permission',-1,'2016-03-30 08:02:59'),(4,'User is not permission',-1,'2016-03-30 08:03:01'),(5,'User is not permission',-1,'2016-03-30 08:03:26'),(6,'User is not permission',-1,'2016-03-30 08:18:54'),(7,'User is not permission',-1,'2016-03-30 08:20:08'),(8,'User is not permission',-1,'2016-03-30 08:28:04'),(9,'User is not permission',-1,'2016-03-30 08:43:37'),(10,'User is not permission',-1,'2016-03-30 08:47:21'),(11,'User is not permission',-1,'2016-03-30 08:47:58'),(12,'User is not permission',-1,'2016-03-30 08:48:14'),(13,'User is not permission',-1,'2016-03-30 08:57:27'),(14,'User is not permission',-1,'2016-03-30 08:57:38'),(15,'User is not permission',-1,'2016-03-30 09:03:05'),(16,'The cattle can not saved',-1,'2016-03-30 09:58:09'),(17,'The cattle can not saved',-1,'2016-03-30 09:59:21'),(18,'The cattle can not saved',-1,'2016-03-30 10:14:26'),(19,'The cattle can not saved',-1,'2016-03-30 10:15:31'),(20,'The cattle can not saved',-1,'2016-03-30 10:15:44'),(21,'The cattle can not saved',-1,'2016-03-30 10:17:13'),(22,'The cattle can not saved',-1,'2016-03-30 10:17:41'),(23,'The cattle can not saved',-1,'2016-03-30 10:20:05'),(24,'The cattle can not saved',-1,'2016-03-30 10:28:33'),(25,'The cattle can not saved 1',-1,'2016-03-30 10:31:32'),(26,'The cattle can not saved',-1,'2016-03-30 10:32:23'),(27,'The cattle can not saved',-1,'2016-03-30 10:33:07'),(28,'The cattle can not saved',-1,'2016-03-30 10:35:53'),(29,'The cattle can not saved',-1,'2016-03-30 10:36:02'),(30,'The cattle can not saved',-1,'2016-03-30 10:36:49'),(84,'The Cost can not saved',-1,'2016-03-30 19:26:22'),(85,'The Cost can not saved',-1,'2016-03-30 19:28:01'),(86,'The Cost can not saved',-1,'2016-03-30 19:29:58'),(87,'The Cost can not saved',-1,'2016-03-30 19:30:19'),(88,'The Cost can not saved',-1,'2016-03-30 19:30:34'),(89,'The Cost can not saved',-1,'2016-03-30 19:31:12'),(90,'The Cost can not saved',-1,'2016-03-30 19:34:40'),(91,'The Cost can not saved',-1,'2016-03-30 19:34:47'),(92,'The Cost can not saved',-1,'2016-03-30 19:38:10'),(93,'The Cost can not saved',-1,'2016-03-30 19:39:04'),(94,'The Cost can not saved',-1,'2016-03-30 19:43:41'),(95,'The Cost can not saved',-1,'2016-03-30 19:43:54'),(96,'The Cost can not saved',-1,'2016-03-30 19:46:53'),(97,'The cattle has been deleted',0,'2016-03-30 19:52:06'),(98,'The cattle has been deleted',0,'2016-03-30 20:04:20'),(99,'The Weights has been deleted',0,'2016-03-30 20:08:29'),(100,'The Weight has been deleted',0,'2016-03-30 20:11:23'),(101,'User is not permission',-1,'2016-03-31 06:38:15'),(102,'User is not permission',-1,'2016-03-31 06:46:17'),(103,'User is not permission',-1,'2016-03-31 06:46:21'),(104,'You has been logged out',1,'2016-03-31 17:26:21'),(105,'The cattle can not saved',-1,'2016-04-01 06:19:43'),(106,'The event can not saved',-1,'2016-04-01 14:50:41'),(107,'The event can not saved',-1,'2016-04-01 14:55:07'),(108,'The event can not saved',-1,'2016-04-01 14:58:00'),(109,'The event can not saved',-1,'2016-04-01 14:58:24'),(110,'The event can not saved',-1,'2016-04-01 14:58:53'),(111,'The event can not saved',-1,'2016-04-01 14:59:58'),(112,'The event can not saved',-1,'2016-04-01 15:00:02'),(113,'The event can not saved',-1,'2016-04-01 15:00:11'),(114,'The event can not saved',-1,'2016-04-01 15:05:53'),(115,'The event can not saved',-1,'2016-04-01 15:06:11'),(116,'The event can not saved',-1,'2016-04-01 15:06:17'),(117,'The event can not saved',-1,'2016-04-01 15:20:28'),(118,'The event can not saved',-1,'2016-04-01 16:09:08'),(119,'The event can not saved',-1,'2016-04-01 16:09:30'),(120,'The event can not saved',-1,'2016-04-01 16:10:31'),(121,'User is not permission',-1,'2016-04-02 06:13:30'),(122,'User is not permission',-1,'2016-04-02 06:52:05'),(123,'User is not permission',-1,'2016-04-02 19:32:34'),(124,'User is not permission',-1,'2016-04-02 20:11:06'),(125,'User is not permission',-1,'2016-04-02 20:11:12'),(126,'leo has been logged out',1,'2016-04-02 20:25:49'),(127,'User is not permission',-1,'2016-04-02 20:36:37'),(128,'User is not permission',-1,'2016-04-03 06:55:55'),(129,'User is not permission',-1,'2016-04-03 06:56:08'),(130,'User is not permission',-1,'2016-04-03 06:56:11'),(131,'User is not permission',-1,'2016-04-03 06:56:29'),(132,'User is not permission',-1,'2016-04-03 06:56:44'),(133,'leo has been logged out',1,'2016-04-03 07:55:15'),(134,'User is not permission',-1,'2016-04-03 11:41:43'),(135,'User is not permission',-1,'2016-04-03 21:20:41');

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cattle_id` int(11) NOT NULL,
  `url` text COLLATE utf8_bin,
  `status` tinyint(4) DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `photos` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` text,
  `avatar_url` text,
  `description` text,
  `role` smallint(6) DEFAULT '0',
  `access_token` text,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `full_name` text,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`avatar_url`,`description`,`role`,`access_token`,`modified`,`full_name`,`status`) values (1,'leo','thanhbinh.gd@gmail.com','leo@123','http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&f=y','super user',1,'511a418e72591eb7e33f703f04c3fa16df6c90bd','2016-04-25 19:39:12','',0),(2,'leobui','leobui@gmail.com','leobui@123','','',0,'c5b76da3e608d34edb07244cd9b875ee86906328','2016-04-03 11:41:40','',0),(3,'leox','leox@gmail.com','leox@123',NULL,NULL,0,'UxUFSEiaXl','2016-03-30 05:42:45',NULL,0),(4,'xxx','xxx@xxx.com','xxxxxx',NULL,'can thang 4',0,'5b384ce32d8cdef02bc3a139d4cac0a22bb029e8','2016-03-31 11:23:17',NULL,0),(5,'leo1','leo1@gmail.com','leo1@123',NULL,NULL,0,'902ba3cda1883801594b6e1b452790cc53948fda','2016-03-31 11:25:46',NULL,0);

/*Table structure for table `weights` */

DROP TABLE IF EXISTS `weights`;

CREATE TABLE `weights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cattle_id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_bin,
  `description` tinytext COLLATE utf8_bin,
  `user_id` int(11) DEFAULT NULL,
  `weight` bigint(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `weights` */

insert  into `weights`(`id`,`cattle_id`,`name`,`description`,`user_id`,`weight`,`date`,`modified`,`status`) values (3,13,'can thang 3','can thang 3',2,950,'2016-03-31 07:37:37','2016-03-30 20:11:08',0),(4,13,'can thang 3','can thang 4',1,950,'2016-03-31 07:38:16','2016-03-31 07:38:16',0),(5,13,'▒▒▒▒▒▒▒▒▒▒▒▒▒▒','▒▒▒▒▒▒▒▒▒▒▒▒▒▒',1,350,'2016-04-01 05:00:00','2016-04-01 16:14:27',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
