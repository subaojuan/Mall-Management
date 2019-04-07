# Host: localhost  (Version: 5.5.40)
# Date: 2017-06-16 13:52:21
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admins"
#

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `a_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `a_account` varchar(20) NOT NULL COMMENT '管理员账号',
  `a_name` varchar(20) NOT NULL COMMENT '管理员昵称',
  `a_password` varchar(60) NOT NULL COMMENT '管理员密码',
  `a_picture` varchar(100) NOT NULL COMMENT '管理员图片',
  `a_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "admins"
#

INSERT INTO `admins` VALUES (1,'admin0701','超级管理员','59fe0e358e440ec588707a0d91a2d99e','/Uploads/2016-12-25/585f5195dd3e8.jpg',1),(4,'admin02','管理员02号','698d51a19d8a121ce581499d7b7016','/Uploads/2017-06-04/5933cdb70a701.jpg',0),(7,'789','管理员03号','e10adc3949ba59abbe56e057f20f883e','/Uploads/2017-01-03/586b6457cd2af.jpg',0),(8,'1429462700','123','e10adc3949ba59abbe56e057f20f883e','/Uploads/2017-06-05/5935493aa9dfa.jpg',0);

#
# Structure for table "areas"
#

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `a_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '区域id',
  `a_name` varchar(50) NOT NULL COMMENT '区域名称',
  `a_pid` mediumint(8) unsigned NOT NULL COMMENT '区域父id',
  `a_flag` char(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='区域表';

#
# Data for table "areas"
#

INSERT INTO `areas` VALUES (1,'陕西省',0,'y'),(3,'陕西科技大学',1,'n'),(4,'西安医学院',1,'n'),(6,'西安工业大学',1,'n');

#
# Structure for table "categorys"
#

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE `categorys` (
  `c_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `c_name` varchar(50) NOT NULL COMMENT '分类名称',
  `c_pid` tinyint(3) unsigned NOT NULL COMMENT '分类父id',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Data for table "categorys"
#

INSERT INTO `categorys` VALUES (1,'校园代步',0),(2,'手机',0),(3,'电脑',0),(4,'数码用品',0),(5,'数码配件',0),(6,'日常电器',0),(7,'运动器材',0),(8,'穿戴衣物',0),(9,'生活娱乐',0),(11,'摩托车',1),(12,'电动车',1),(13,'自行车',1),(14,'台式机',3),(15,'笔记本',3),(16,'MP3',4),(17,'MP4',4),(18,'相机',4),(19,'单反',4),(20,'游戏机',4),(21,'平板',4),(22,'其它',4),(23,'耳机',5),(24,'移动电源',5),(25,'移动硬盘',5),(26,'鼠标',5),(27,'键盘',5),(28,'U盘',5),(29,'数据线',5),(30,'其它',5),(31,'电扇',6),(32,'电灯',6),(33,'电扇',6),(34,'洗衣机',6),(35,'电吹风',6),(36,'电水壶',6),(37,'热水器',6),(38,'空调',6),(39,'电视',6),(40,'其它',6),(41,'篮球',7),(42,'足球',7),(43,'球拍',7),(44,'哑铃',7),(45,'轮滑',7),(46,'其它',7),(47,'帽子',8),(48,'上衣',8),(49,'裤子',8),(50,'鞋',8),(51,'背包',8),(52,'裙子',8),(53,'其它',8),(54,'乐器',9),(55,'虚拟账号',9),(56,'充值卡',9),(57,'会员卡',9),(58,'化妆品',9),(59,'日常品',9),(60,'其它',9),(61,'其它',2),(62,'其他',1);

#
# Structure for table "emails"
#

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_title` varchar(32) NOT NULL DEFAULT '' COMMENT '发件主题',
  `e_content` varchar(255) NOT NULL DEFAULT '' COMMENT '发件内容',
  `e_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发件时间',
  `e_user` varchar(128) NOT NULL DEFAULT '0' COMMENT '接收邮箱',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='发件表';

#
# Data for table "emails"
#

INSERT INTO `emails` VALUES (14,'123','123456','2017-06-04 17:33:19','valemia@163.com'),(15,'','字数不能超过200个字','2017-06-04 17:56:28','valemi63.com'),(16,'','字数不能超过200个字','2017-06-04 17:56:38','123456'),(17,'','字数不能超过200个字','2017-06-04 17:56:50','123456'),(19,'nihao ','djdh ','2017-06-05 19:07:54','769585163@qq.com'),(20,'dd','sssssssss','2017-06-12 01:41:14','769585163@qq.com'),(21,'nihao','味精  好好学习','2017-06-15 14:35:35','244072356@qq.com'),(22,'nihao','加油加油','2017-06-15 14:37:33','13759793398@163.com'),(23,'dd','ddd','2017-06-16 01:52:36','18710643957@163.com'),(24,'gg','字数不能超ggg过200个字','2017-06-16 01:54:32','769585163@qq.com'),(25,'ff','字数不能超过200ff个字','2017-06-16 01:59:55','769585163@qq.com'),(26,'ff','字数不能超ffff过200个字','2017-06-16 02:00:52','769585163@qq.com'),(27,'gg','字数不能超过2gggg00个字','2017-06-16 02:01:06','18710643957@163.com');

#
# Structure for table "goods"
#

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `g_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `g_name` varchar(200) NOT NULL COMMENT '商品名称',
  `g_brand` varchar(50) NOT NULL DEFAULT '无' COMMENT '商品品牌',
  `g_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `g_num` int(11) NOT NULL COMMENT '商品数量',
  `g_desc` longtext COMMENT '商品描述',
  `g_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '商品logo',
  `g_new` tinyint(4) NOT NULL COMMENT '新旧程度，1,2,3,4,5,6',
  `is_price` tinyint(3) NOT NULL DEFAULT '1' COMMENT '可以价为1，反之为0',
  `g_category` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '商品主分类',
  `g_categorys` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '商品子分类',
  `g_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '商品创建时间',
  `g_user` int(11) NOT NULL DEFAULT '0' COMMENT '商品卖家',
  `g_school` tinyint(3) NOT NULL DEFAULT '0' COMMENT '出售学校',
  `g_flag` varchar(2) NOT NULL DEFAULT 'n' COMMENT '商品是否上架',
  PRIMARY KEY (`g_id`),
  KEY `g_price` (`g_price`),
  KEY `g_time` (`g_time`),
  KEY `g_category` (`g_category`),
  KEY `g_new` (`g_new`),
  KEY `g_name` (`g_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='商品表';

#
# Data for table "goods"
#

INSERT INTO `goods` VALUES (8,'“看看我”','佳盟',500.00,5,'<p>   \n            <span style=\"text-decoration:underline;\">华英加入</span></p>','/Uploads/2017-06-04/5933f17e93f28.jpg',4,0,6,39,'2017-06-04 19:39:42',30,3,'y'),(9,'爱心百合','“苏苏”',20.00,10,'<p>   \n            </p>','/Uploads/2017-06-04/5933f44027dec.jpg',4,1,9,59,'2017-06-04 19:51:28',30,3,'y'),(11,'女神','廉价牌',22.00,2,'<p>\t   \t\t</p><p> \n\t   \t\t            <img src=\"http://120.24.15.224/Public/ueditor/php/upload/20170605/14966418784206.jpg\" alt=\"14966418784206.jpg\" /></p>','/Uploads/2017-06-05/5934f0b8e7997.jpg',6,1,1,12,'2017-06-05 01:19:04',31,6,'y'),(12,'男神','廉价牌',22.00,2,'<p> \n\t   \t\t            </p>','/Uploads/2017-06-05/5934f297c096f.jpg',1,1,1,11,'2017-06-05 13:01:23',31,6,'y'),(13,'22','22',0.00,2,'<p> \n\t   \t\t            </p>','/Uploads/2017-06-05/5934e6651fc9c.jpg',1,1,1,11,'2017-06-05 13:04:37',31,6,'y'),(14,'33','33',0.00,33,'<p>\t   \t\t</p><p> \n\t   \t\t            </p>','/Uploads/2017-06-05/5934f289667c1.jpg',1,1,1,11,'2017-06-05 13:14:03',31,6,'n'),(16,'车','大众',30000.00,123,'<p>\t   \t\t</p><p>\t   \t\t</p><p><img src=\"http://120.24.15.224/Public/ueditor/php/upload/20170605/14966641609818.png\" alt=\"14966641609818.png\" />\t    \t\t</p><p>                 白色，性能好</p>','/Uploads/2017-06-05/593546c838721.PNG',4,1,1,62,'2017-06-05 19:55:52',33,6,'y'),(17,'V','V',115.00,1,'<p>\t   \t\t</p><p>                 非常好</p>','/Uploads/2017-06-05/593546def05ed.JPG',6,0,8,53,'2017-06-05 19:56:14',34,3,'y'),(18,'shrit','power to go',0.00,1,'<p>\t   \t\t</p><p>\t   \t\t</p><p>\t   \t\t</p><p><img src=\"http://120.24.15.224/Public/ueditor/php/upload/20170605/14966642983229.jpeg\" alt=\"14966642983229.jpeg\" /></p><p><img src=\"http://120.24.15.224/Public/ueditor/php/upload/20170605/14966643037145.jpg\" alt=\"14966643037145.jpg\" /></p><p>   \n            <br /></p>','/Uploads/2017-06-05/5935490d60e89.jpeg',6,0,8,48,'2017-06-05 20:05:33',34,3,'y'),(19,'绿卡','美国',0.00,100,'<p>                 在美国定居无忧虑</p>','/Uploads/2017-06-05/59355318a58b0.PNG',6,1,9,60,'2017-06-05 20:48:24',33,6,'y'),(20,'麻将机','麻将机',5000.00,1,'<p>                  这是一台神奇的麻将机，机不可失时不再来，抓紧时间抢购。</p>','/Uploads/2017-06-05/59357273b5f73.JPG',6,0,9,60,'2017-06-05 23:02:11',35,6,'y'),(21,'大爷','11',11.00,11,'<p>                 11</p>','/Uploads/2017-06-11/593cb44185056.jpg',1,1,1,11,'2017-06-11 11:08:49',31,6,'y'),(22,'二爸','搜索2',22.00,22,'<p>                 22</p>','/Uploads/2017-06-11/593cf3c4d0f52.jpg',1,1,1,11,'2017-06-11 15:39:48',31,6,'y'),(23,'g','ff',6.00,6,'<p>                 66</p>','/Uploads/2017-06-11/593cf9413511c.jpg',1,1,1,12,'2017-06-11 16:03:13',31,6,'y'),(24,'黄豆','11',11.00,11,'<p>                 11</p>','/Uploads/2017-06-11/593cfeccde8a9.jpeg',1,1,1,11,'2017-06-11 16:26:52',31,6,'y'),(25,'笔记本','22',22.00,22,'<p>                 22</p>','/Uploads/2017-06-11/593d0099d29d6.jpeg',1,1,1,12,'2017-06-11 16:34:33',31,6,'n'),(26,'洗衣机1','33',33.00,33,'<p>\t   \t\t</p><p>                 33</p>','/Uploads/2017-06-11/593d00c0e726f.jpeg',1,1,1,11,'2017-06-11 16:35:12',31,6,'y');

#
# Structure for table "goodsnew"
#

DROP TABLE IF EXISTS `goodsnew`;
CREATE TABLE `goodsnew` (
  `gn_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品新旧\r\n\r\nid',
  `gn_name` varchar(12) NOT NULL COMMENT '商品新旧1五成以下,2六成,3七\r\n\r\n成,4八成,5九成,6全新',
  PRIMARY KEY (`gn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='商品新旧表';

#
# Data for table "goodsnew"
#

INSERT INTO `goodsnew` VALUES (1,'五成新及以下'),(2,'六成新'),(3,'七成新'),(4,'八成新'),(5,'九成新'),(6,'全新');

#
# Structure for table "goodsuser"
#

DROP TABLE IF EXISTS `goodsuser`;
CREATE TABLE `goodsuser` (
  `gu_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `users_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `school_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品学校',
  `gu_flag` char(2) NOT NULL DEFAULT 'n' COMMENT '商品状态id',
  `gu_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '商品状态改变时间',
  PRIMARY KEY (`gu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "goodsuser"
#

INSERT INTO `goodsuser` VALUES (8,8,30,3,'y','2017-06-04 19:40:58'),(9,9,30,3,'y','2017-06-04 19:51:41'),(11,11,31,6,'y','2017-06-05 13:41:33'),(12,12,31,6,'y','2017-06-05 13:53:27'),(13,13,31,6,'y','2017-06-05 13:17:54'),(14,14,31,6,'n','2017-06-09 14:38:10'),(16,16,33,6,'y','2017-06-05 20:40:36'),(17,17,34,3,'y','2017-06-05 19:56:38'),(18,18,34,3,'y','2017-06-05 20:06:56'),(19,19,33,6,'y','2017-06-05 20:48:32'),(20,20,35,6,'y','2017-06-05 23:03:56'),(21,21,31,6,'y','2017-06-11 11:08:58'),(22,22,31,6,'y','2017-06-11 15:39:57'),(23,23,31,6,'y','2017-06-11 16:03:23'),(24,24,31,6,'y','2017-06-11 16:27:10'),(25,25,31,6,'n','2017-06-16 10:57:16'),(26,26,31,6,'y','2017-06-11 16:35:17');

#
# Structure for table "helpgoods"
#

DROP TABLE IF EXISTS `helpgoods`;
CREATE TABLE `helpgoods` (
  `h_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '求购商品id',
  `h_name` varchar(200) NOT NULL COMMENT '求购商品名称',
  `h_price` decimal(10,2) NOT NULL COMMENT '求购商品价格',
  `h_num` int(11) NOT NULL COMMENT '求购商品数量',
  `h_desc` longtext NOT NULL COMMENT '附加描述',
  `h_time` datetime NOT NULL COMMENT '求购发布时间',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `h_school` tinyint(3) NOT NULL DEFAULT '0' COMMENT '学校id',
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='求购商品表';

#
# Data for table "helpgoods"
#

INSERT INTO `helpgoods` VALUES (9,'电脑',3000.00,1,'<p>                 反应快一些</p>','2017-06-04 19:45:25',30,3),(12,'V面具',1105.00,1,'<p>\t   \t\t </p><p>\t   \t\t </p><p>                 V<img src=\"http://120.24.15.224/Public/ueditor/php/upload/20170605/1496663844915.jpg\" alt=\"1496663844915.jpg\" /></p>','2017-06-05 20:46:11',34,3),(13,'手机',2300.00,1,'<p>                 小米6，白色</p>','2017-06-05 19:57:46',33,6);

#
# Structure for table "messages"
#

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_title` varchar(32) NOT NULL DEFAULT '' COMMENT '留言主题',
  `m_content` varchar(255) NOT NULL DEFAULT '' COMMENT '留言内容',
  `m_time` datetime NOT NULL DEFAULT '2017-03-12 18:30:20' COMMENT '留言时间',
  `m_user` varchar(4) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `m_flag` char(8) NOT NULL DEFAULT '' COMMENT '是否阅读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='用户留言表';

#
# Data for table "messages"
#

INSERT INTO `messages` VALUES (6,'你好管理员','你好管理员','2017-05-17 02:55:29','2','已阅'),(13,'hello','hello','2017-06-05 19:58:15','34','已阅'),(14,'嗨喽','很好','2017-06-05 19:58:20','33','已阅'),(15,'纪鑫','你是不是傻逼，你就是个傻逼。','2017-06-05 23:00:17','35','已阅'),(16,'hah','hahh','2017-06-16 10:56:48','31','');

#
# Structure for table "passwords"
#

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE `passwords` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(64) NOT NULL DEFAULT '0' COMMENT '用户邮箱',
  `user_passwd` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='密码表';

#
# Data for table "passwords"
#

INSERT INTO `passwords` VALUES (18,'2967254652@qq.com','199871'),(19,'18710643957@163.com','111111'),(20,'18402927708@163.com','123456'),(21,'1479478579@qq.com','456654'),(22,'2924711308@qq.com','111111'),(23,'909466258@qq.com','1.11aa');

#
# Structure for table "picture"
#

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `url` varchar(255) DEFAULT NULL COMMENT '轮播图url',
  `flag` char(4) NOT NULL DEFAULT '' COMMENT '是否轮播',
  `first` char(1) NOT NULL DEFAULT '' COMMENT '是否为主轮播',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='轮播图片';

#
# Data for table "picture"
#

INSERT INTO `picture` VALUES (7,'/Uploads/2017-05-17/591b29274b9aa.jpg','y','n'),(8,'/Uploads/2017-05-17/591b2934ebf1e.jpg','y','n'),(9,'/Uploads/2017-05-17/591b37873d0d8.jpg','y','n'),(11,'/Uploads/2017-06-04/5933d256984a3.jpg','y','y');

#
# Structure for table "sphinx"
#

DROP TABLE IF EXISTS `sphinx`;
CREATE TABLE `sphinx` (
  `max_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品最大ID';

#
# Data for table "sphinx"
#

INSERT INTO `sphinx` VALUES (26);

#
# Structure for table "tips"
#

DROP TABLE IF EXISTS `tips`;
CREATE TABLE `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL COMMENT '公告内容',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '公告时间',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '公告主题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='公告表';

#
# Data for table "tips"
#

INSERT INTO `tips` VALUES (18,'<p><span style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:14px;\">欢迎各位学生，上线注册，得到自己想要的物品，用最少的价钱买最实用的物品！</span></p>','2017-06-05 15:11:18','北郊三校服务平台上线啦！！！');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `u_account` varchar(255) NOT NULL DEFAULT '' COMMENT '用户账号',
  `u_nickname` varchar(60) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `u_password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `u_picture` varchar(200) DEFAULT '' COMMENT '用户图片',
  `u_school` char(2) NOT NULL COMMENT '用户所属学校',
  `u_qq` varchar(255) NOT NULL DEFAULT '' COMMENT '用户qq',
  `u_phone` varchar(32) NOT NULL DEFAULT '' COMMENT '用户手机',
  `u_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (30,'2967254652@qq.com','娟娟','96e79218965eb72c92a549dd5a330112','/Uploads/2017-06-04/5933f1a52b876.jpg','3','2967254652','13772425901','2017-06-04 19:36:53'),(31,'18710643957@163.com','瑾瑜','96e79218965eb72c92a549dd5a330112','/Uploads/person512.png','6','769585163','18710643957','2017-06-05 01:17:45'),(32,'18402927708@163.com','weikai','e10adc3949ba59abbe56e057f20f883e','/Uploads/person512.png','6','9313949460','18402927708','2017-06-05 17:10:00'),(33,'1479478579@qq.com','不忘初心','96e79218965eb72c92a549dd5a330112','/Uploads/2017-06-05/593559da3ac9d.PNG','6','1479478579','18392743023','2017-06-05 19:35:26'),(34,'2924711308@qq.com','二三十','96e79218965eb72c92a549dd5a330112','/Uploads/2017-06-05/5935486aa8b03.jpeg','3','2924711308','13572956033','2017-06-05 19:38:50'),(35,'909466258@qq.com','八戒','96e79218965eb72c92a549dd5a330112','/Uploads/2017-06-05/5935736a5f05d.JPG','6','909466258','18309220499','2017-06-05 22:57:20');
