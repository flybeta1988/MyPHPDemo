-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: bookdb
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `bookdb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bookdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `bookdb`;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `isbn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '图书价格',
  `thumb` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '图书缩略图',
  `sid` int unsigned NOT NULL DEFAULT '0' COMMENT '书架id',
  `cid` int unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '状态：0.正常；1.已借出；2.已下架；',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `utime` int unsigned NOT NULL DEFAULT '0',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='图书表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'深入PHP面向对象、模式与实践','9b15441e-63be-11ec-9db7-46f7ce1096d7',0.00,'20211223150443_5546.jpg',8,2,1,0,1640243083,1649231628,NULL),(2,'深入PHP面向对象、模式与实践（第三版）','03ba0666-63c0-11ec-9d16-46f7ce1096d7',0.00,'20211223151448_8210.jpg',0,0,0,0,1640243688,1647590080,NULL),(3,'淘宝技术这十年','556d00d0-63c0-11ec-90f7-46f7ce1096d7',0.00,'20211223151855_3755.jpeg',0,0,0,2,1640243935,1640322388,1640326531),(4,'Shell脚本学习指南','87f87afc-63ca-11ec-a7d1-46f7ce1096d7',0.00,'20211223163130_2708.jpg',1,1,1,1,1640248290,1649231619,NULL),(5,'Linux内核设计与实践','22342b92-6494-11ec-9e6c-46f7ce1096d7',0.00,'20211224163343_7816.jpg',2,1,1,1,1640334823,1647590126,NULL),(6,'自制编译器','46205666-6494-11ec-bd9f-46f7ce1096d7',0.00,'20211224163437_4413.jpg',1,1,1,0,1640334877,1640768377,NULL),(7,'Docker实践','6ab799d0-6494-11ec-a79f-46f7ce1096d7',0.00,'20211224163532_3457.jpg',2,1,1,1,1640334932,1640765013,NULL),(8,'Java从入门到精通','96293934-6494-11ec-8123-46f7ce1096d7',0.00,'20211224163640_1207.jpg',1,1,1,0,1640335000,0,NULL),(9,'奔跑吧linux内核','9dcf9a84-6494-11ec-94b3-46f7ce1096d7',0.00,'20211224163710_6605.jpg',2,1,1,2,1640335030,1641646378,NULL),(10,'Linux网络编程022','b36a34c8-6ec4-11ec-a576-62071acd37bb',20.99,'20220225150020_2443.jpg',1,1,11,0,1641455222,1645772420,NULL),(11,'Linux网络编程023','62eeb676-9841-11ec-866a-0242428648ec',0.00,'20220228105227_7239.jpg',1,1,11,0,1646016747,0,NULL),(12,'Linux网络编程024','01e60108-9842-11ec-aef0-0242428648ec',0.00,'20220228105634_6031.jpg',1,1,11,0,1646016994,0,NULL),(13,'Linux网络编程024','29194528-9847-11ec-825d-0242428648ec',0.00,'20220228113324_5539.jpg',1,2,11,0,1646019204,0,NULL),(14,'Linux网络编程024','911ff70c-9847-11ec-8c99-0242428648ec',0.00,'20220228113618_2970.jpg',2,1,11,1,1646019378,1649230769,NULL),(15,'Linux网络编程025','3c353bf6-b57c-11ec-a16b-024255bd933c',100.00,'20220406153638_4178.jpg',7,1,11,0,1649230598,1649231842,NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_shelf`
--

DROP TABLE IF EXISTS `book_shelf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_shelf` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '书架名',
  `cid` int unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `utime` int unsigned NOT NULL DEFAULT '0',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='书架表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_shelf`
--

LOCK TABLES `book_shelf` WRITE;
/*!40000 ALTER TABLE `book_shelf` DISABLE KEYS */;
INSERT INTO `book_shelf` VALUES (1,'A',1,1,0,0,NULL),(2,'B',1,1,0,0,NULL),(3,'D',1,1,0,1640574662,1640574662),(4,'C',0,0,1640571240,1640584808,1640584808),(5,'E',0,0,1640571329,1640574615,1640574615),(6,'F',1,0,1640571792,1640574652,1640574652),(7,'D',1,0,1640574750,0,NULL),(8,'E',1,0,1640574758,0,NULL),(9,'F',1,0,1640574764,1640584759,NULL),(10,'G',1,0,1640585734,0,NULL),(11,'H',1,0,1640585784,0,NULL);
/*!40000 ALTER TABLE `book_shelf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '分类名称',
  `uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `utime` int unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'计算机科学',1,0,0,NULL),(2,'社会传播学',1,0,1640589346,NULL),(3,'生物科学',0,1640589198,1640589230,1640589230),(4,'生物科学',0,1640589380,0,NULL),(5,'自动化科学',0,1640589459,0,NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lend_record`
--

DROP TABLE IF EXISTS `lend_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lend_record` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `book_id` int unsigned NOT NULL DEFAULT '0' COMMENT '图书id',
  `reader_id` int unsigned NOT NULL DEFAULT '0' COMMENT '读者id',
  `uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `start_time` int unsigned NOT NULL DEFAULT '0' COMMENT '借阅开始时间',
  `end_time` int unsigned NOT NULL DEFAULT '0' COMMENT '借阅结束时间',
  `return_time` int unsigned NOT NULL DEFAULT '0' COMMENT '还书时间',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '状态：0.借出；1.已还；2.过期；',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `utime` int unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='借阅记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lend_record`
--

LOCK TABLES `lend_record` WRITE;
/*!40000 ALTER TABLE `lend_record` DISABLE KEYS */;
INSERT INTO `lend_record` VALUES (1,1,1,1,1640707200,1641571200,0,2,1640763421,1647588796,NULL),(2,9,1,1,1640707200,1641571200,0,2,1640763484,1647589901,NULL),(3,7,2,1,1640707200,1641571200,0,2,1640765013,1647589901,NULL),(4,9,2,1,1640707200,1641571200,1640768654,1,1640765013,1640768654,NULL),(6,5,2,1,1640707200,1641571200,1640768654,1,1640767230,1640768570,NULL),(7,6,2,1,1640707200,1641571200,1640768654,1,1640767230,1640768377,NULL),(10,1,10,11,1644854400,1645977600,0,2,1644918360,1647589901,NULL),(11,2,10,11,1644854400,1645977600,1647590080,1,1644918360,1647590080,NULL),(12,5,1,11,1647532800,1648656000,0,0,1647590126,0,NULL),(13,14,0,11,1649174400,1651248000,0,0,1649230769,0,NULL),(14,15,0,11,1649174400,1651248000,1649231842,1,1649230769,1649231842,NULL),(15,1,0,11,1649779200,1651075200,0,0,1649231286,0,NULL),(16,1,2,11,1649174400,1651248000,1649231628,1,1649231619,1649231628,NULL),(17,4,2,11,1649174400,1651248000,0,0,1649231619,0,NULL);
/*!40000 ALTER TABLE `lend_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '系統名称',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `utime` int unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='设置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe_record`
--

DROP TABLE IF EXISTS `subscribe_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribe_record` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `book_id` int unsigned NOT NULL DEFAULT '0' COMMENT '图书id',
  `reader_uid` int unsigned NOT NULL DEFAULT '0' COMMENT '读者id',
  `admin_uid` int unsigned NOT NULL DEFAULT '0' COMMENT '管理员id',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '状态：0.待处理；1.已处理；',
  `ctime` int unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `utime` int unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='读者预约登记表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe_record`
--

LOCK TABLES `subscribe_record` WRITE;
/*!40000 ALTER TABLE `subscribe_record` DISABLE KEYS */;
INSERT INTO `subscribe_record` VALUES (1,7,10,0,0,1645770860,1646016076,1646016076),(2,7,10,0,0,1646013197,1646016091,1646016091),(3,7,10,0,0,1646013483,1646016102,1646016102),(4,7,10,0,0,1646016116,0,NULL),(5,2,10,0,0,1646016272,1648626937,1648626937),(6,5,10,0,0,1648627639,1648629243,1648629243),(7,5,10,0,0,1648629259,1648629302,1648629302),(8,7,1,0,0,1648629741,0,NULL);
/*!40000 ALTER TABLE `subscribe_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `password` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户密码（md5加密串）',
  `idcard` char(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '身份证号',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '账号余额（押金）',
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '地址',
  `mobile` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `role_id` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '角色id：0.普通读者；1.管理员；',
  `status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '状态：0.正常；1.拉黑；',
  `ctime` int unsigned NOT NULL DEFAULT '0',
  `utime` int unsigned NOT NULL DEFAULT '0',
  `dtime` int unsigned DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idcard` (`idcard`),
  KEY `idx_mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'flybeta','','142233199005206221',100.00,'北京海淀清华科技园','18601345705',0,0,0,1648629715,NULL),(2,'田欢','','142233198909092001',0.00,'河北大名县','13693306649',0,0,1640678520,0,NULL),(5,'田欢2','','142233198909092002',0.00,'河北大名县2','13693306648',0,0,1640678715,0,NULL),(7,'田欢3','','142233198909092003',0.00,'河北大名县3','13693306647',0,0,1640678941,0,NULL),(8,'田欢4','','142233198909092004',0.00,'河北大名县4','13693306646',0,0,1640679020,1640681179,1640681179),(10,'flyalpha','123456','142233198901016321',100.00,'北京海淀','18601345705',0,0,1644914612,0,NULL),(11,'admin','123456','142233198901016322',100.00,'北京海淀','18601345705',1,0,1644914672,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-17 19:13:52
