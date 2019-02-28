/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.0.19-nt : Database - restaurantmanagement
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`restaurantmanagement` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `restaurantmanagement`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` bigint(10) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(16) NOT NULL,
  `subject` varchar(255) default NULL,
  `message` varchar(255) NOT NULL,
  `adding_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

insert  into `contact`(`id`,`name`,`email`,`phone_no`,`subject`,`message`,`adding_date`) values (1,'gautam','ram@gmail.com','7820866619','text','i am a student','2015-01-25 09:41:32'),(2,'gautam','ram@gmail.com','7820866619','ram','compleate project','2015-01-26 11:07:02'),(10,'gautam','ram@gmail.com','7820866619','php','ghansmaddfvdf','2015-02-02 08:51:03'),(11,'gautam','divya@gmail.com','7820866619','i have successfully registred','i have successfully registred','2015-02-02 08:57:07'),(12,'hsj','sjdb@gmail.com','dshjkhjkjn','uh',' jkdkfsbf','2015-04-19 06:45:53'),(13,'newone','newone@gmail.com','9897456495','problem no 2','i have problem in all the subjects.. please help','2015-04-19 07:22:21');

/*Table structure for table `offer_of_day` */

DROP TABLE IF EXISTS `offer_of_day`;

CREATE TABLE `offer_of_day` (
  `id` bigint(20) NOT NULL auto_increment,
  `resturent_id` bigint(20) default NULL,
  `offer_name` varchar(200) default NULL,
  `details` varchar(255) default NULL,
  `image` varchar(255) default NULL,
  `price` decimal(10,2) default '0.00',
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `offer_of_day` */

insert  into `offer_of_day`(`id`,`resturent_id`,`offer_name`,`details`,`image`,`price`,`created`) values (1,19,'Food Offer','discount 1000 minimum purchased amount 5000','uploads/product_name//f2016015043.jpg','1000.00','2016-04-26 01:50:43');

/*Table structure for table `resturent_menu` */

DROP TABLE IF EXISTS `resturent_menu`;

CREATE TABLE `resturent_menu` (
  `id` bigint(20) NOT NULL auto_increment,
  `resturent_id` bigint(20) default NULL,
  `meal_name` varchar(200) default NULL,
  `meal_deteails` varchar(255) default NULL,
  `meal_img` varchar(255) default NULL,
  `price` decimal(10,2) default '0.00',
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `resturent_menu` */

insert  into `resturent_menu`(`id`,`resturent_id`,`meal_name`,`meal_deteails`,`meal_img`,`price`,`created`) values (1,2,'Ghanshyam','ghanshyam','uploads/product_name/f2016071536.JPG','359.00','2016-04-25 07:15:36'),(2,2,'text','rent','uploads/product_name/f2016071634.JPG','3554.00','2016-04-25 07:16:34'),(4,2,'chouming','hoosing a suitable Kotak Mahindra Bank Savings Account can be a frugal ... the Savings Account eligibility form available online with required personal data.','uploads/product_name//f2016075034.jpg','789.00','2016-04-25 07:50:34'),(5,19,'Chiness Food','Chiness Food','uploads/product_name//f2016012028.jpg','150.00','2016-04-26 01:20:29');

/*Table structure for table `resturent_rating` */

DROP TABLE IF EXISTS `resturent_rating`;

CREATE TABLE `resturent_rating` (
  `id` bigint(20) NOT NULL auto_increment,
  `resturent_id` bigint(20) default NULL,
  `rating` int(10) default NULL,
  `user_id` bigint(20) default NULL,
  `reviews_title` varchar(255) default NULL,
  `reviews_description` varchar(255) default NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `resturent_rating` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) default NULL,
  `phone_no` varchar(10) default NULL,
  `gender` varchar(16) NOT NULL default '',
  `dob` varchar(25) default NULL,
  `city` varchar(100) default NULL,
  `state` varchar(255) default NULL,
  `address` varchar(100) default NULL,
  `description` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `pin_no` varchar(6) default NULL,
  `imgpath` varchar(255) default NULL,
  `status` char(1) default '1',
  `user_type` enum('admin','restaurant','user') default 'user',
  `adding_date` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`phone_no`,`gender`,`dob`,`city`,`state`,`address`,`description`,`country`,`pin_no`,`imgpath`,`status`,`user_type`,`adding_date`) values (1,'Administrator','admin@gmail.com','admin','8459811826','Male','7-1-1993','delhi','new delhi','c-144',NULL,'india','100126','uploads/userspic/f2015074338.jpg','1','admin','2015-01-26 16:08:20'),(2,'Shaurya','shaurya@gmail.com','shaurya','9871685669','','7-1-1993','new deljhi','delhi','c-144 ',NULL,'india','110065','uploads/userspic/f2015072338.jpg','1','restaurant','2015-03-23 06:25:34'),(5,'shruti','shruti@gmail.com','pawan','9650572216','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','user','2015-04-19 07:15:03'),(10,'R K Traders','pawan@gmail.com','pawan','9818637154','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','user','2016-04-25 08:16:37'),(14,'R K Traders','rkt@gmail.com','gests','9818637154','',NULL,NULL,NULL,NULL,'Choosing a suitable Kotak Mahindra Bank Savings Account can be a frugal ... the Savings Account eligibility form available online with required personal data.',NULL,NULL,NULL,'1','user','2016-04-25 08:51:41'),(19,'Hotmess','info@hotmess.com','hotmess','8989898989','','','Uttam Nagar','Delhi','','HOTMESS Restoranent','India','110018','uploads/f2016010823.jpg','1','restaurant','2016-04-26 01:08:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
